<?php

namespace App\Http\Controllers\UserController;


use App\Models\Venue;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Category;
use App\Models\VenueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserBookingValidation;

class HomeController extends Controller
{
    public function showCategories()
    {
        // Fetch random categories with their images
        $categories = Category::inRandomOrder()->limit(11)->get(['category_id', 'name', 'image']);
        $venues = Venue::with('images')
            ->withCount(['bookings as booking_count'])
            ->orderByDesc('booking_count')
            ->limit(3)
            ->get();
        $activities = Activity::with('venue')->inRandomOrder()->take(10)->get();
        return view('user.home', compact('categories', 'venues', 'activities'));
    }

    public function showVenues()
    {
        // Fetch all venues
        // $venues = Venue::with('images')->get();
        $categories = Category::all();

        // Pass the venues to the view
        return view('user.venues', compact('categories'));
    }


    public function getNearestVenues(Request $request)
    {
        $userLatitude = $request->input('latitude');
        $userLongitude = $request->input('longitude');
        $offset = $request->input('offset', 0); // البداية الافتراضية
        $limit = $request->input('limit', 3);  // العدد الافتراضي لكل طلب

        if (!$userLatitude || !$userLongitude) {
            return response()->json(['message' => 'Latitude and Longitude are required.'], 400);
        }

        $query = Venue::select('venues.*', DB::raw("(
            6371 * acos(
                cos(radians(?)) 
                * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(latitude))
            )
        ) AS distance"))
            ->setBindings([$userLatitude, $userLongitude, $userLatitude])
            ->where('venues.status', 'active');

        // إذا تم تحديد النوع
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        // إذا تم تحديد الفئة
        if ($request->has('category') && $request->category) {
            $query->whereExists(function ($subQuery) use ($request) {
                $subQuery->select(DB::raw(1))
                    ->from('activities')
                    ->join('categories', 'categories.category_id', '=', 'activities.category_id')
                    ->whereRaw('activities.venue_id = venues.venue_id')
                    ->where('categories.name', 'like', '%' . $request->category . '%');
            });
        }


        if ($request->has('tag') && $request->tag) {
            $query->where(function ($query) use ($request) {

                $query->whereExists(function ($subQuery) use ($request) {
                    $subQuery->select(DB::raw(1))
                        ->from('venue_tag')
                        ->join('tags', 'tags.tag_id', '=', 'venue_tag.tag_id') // ربط جدول tags
                        ->whereRaw('venue_tag.venue_id = venues.venue_id') // ربط الأماكن بالعلامات
                        ->where('tags.tag_name', 'like', '%' . $request->tag . '%'); // شرط التحقق من الاسم
                })
                    // أو إذا كان اسم المكان يحتوي على النص المدخل
                    ->orWhere(function ($subQuery) use ($request) {
                        $subQuery->select(DB::raw(1))
                            ->from('venues') // جدول الأماكن
                            ->where('name', 'like', '%' . $request->tag . '%'); // التحقق من اسم المكان
                    });
            });
        }



        $query->orderBy('distance')
            ->offset($offset)
            ->limit($limit);

        $venues = $query->get();

        if ($venues->isEmpty() && $offset == 0) {
            return response()->json(['message' => 'No venues found for this tag or filters.']);
        }

        return response()->json($venues);
    }


    public function VenueCategoryPage($categoryId)
    {

        $category = Category::find($categoryId);

        if (!$category) {
            return redirect()->route('venues.page')->with('error', 'Category not found');
        }

        return view('user.venueCate', compact('category'));
    }


    public function venueCate(Request $request)
    {
        $userLatitude = $request->input('latitude');
        $userLongitude = $request->input('longitude');
        $cateId = $request->input('categoryId');
        $offset = $request->input('offset', 0); // Default start offset
        $limit = $request->input('limit', 3);  // Default number of results per request

        if (!$userLatitude || !$userLongitude) {
            return response()->json(['message' => 'Latitude and Longitude are required.'], 400);
        }

        $query = Venue::select('venues.*', DB::raw("(
            6371 * acos(
                cos(radians(?)) 
                * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(latitude))
            )
        ) AS distance"))
            ->setBindings([$userLatitude, $userLongitude, $userLatitude])
            ->where('venues.status', 'active');

        // Check if category is provided
        if ($cateId) {
            $query->whereExists(function ($subQuery) use ($cateId) {
                $subQuery->select(DB::raw(1))
                    ->from('activities')
                    ->join('categories', 'categories.category_id', '=', 'activities.category_id')
                    ->whereRaw('activities.venue_id = venues.venue_id')
                    ->where('categories.category_id', '=', $cateId); // Use categoryId from the request
            });
        }

        // Check for tags if provided
        if ($request->has('tag') && $request->tag) {
            $query->whereExists(function ($subQuery) use ($request) {
                $subQuery->select(DB::raw(1))
                    ->from('venue_tag')
                    ->join('tags', 'tags.tag_id', '=', 'venue_tag.tag_id')
                    ->whereRaw('venue_tag.venue_id = venues.venue_id')
                    ->where('tags.tag_name', 'like', '%' . $request->tag . '%');
            });
        }

        $query->orderBy('distance')
            ->offset($offset)
            ->limit($limit);

        $venues = $query->get();

        if ($venues->isEmpty() && $offset == 0) {
            return response()->json(['message' => 'No venues found for this category or filters.']);
        }

        return response()->json($venues);
    }


    public function show($id)
    {
        $venue = Venue::with('images', 'activities')->findOrFail($id);
        return view('user.single-venue', compact('venue'));
    }

    public function bookingCreate(UserBookingValidation $request)
    {
        $validatedData = $request->validated();


        $data = array_merge($validatedData, [
            'user_id' => auth()->id(),
            'status' => 'Pending',
        ]);
        Booking::create($data);


        return redirect()->back()->with('success', 'Booking Added Successfully!');
    }

    public function storeMessage(Request $request)
    {
        // Validate the input data
        $request->validate([
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact message
        Contact::create([
            'user_id' => auth()->id(),
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
