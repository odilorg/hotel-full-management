<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::join('cargos', 'inventories.cargo_id', '=', 'cargos.id')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->select([
                'inventories.id','inventories.product_price_total','inventories.product_quantity','inventories.product_total_weight',
                'products.product_name','products.product_price','products.product_weight',
                'cargos.cargo_arrival_date',
                             ])
            ->paginate(13); 
    $reservations = Reservation::get();
      

     return view('reservations.index', compact('reservations'));
    }
    public function beds24()
    {
        $attributes2 =  request()->validate([

            'from_date' => ['required '],
            'to_date' => ['required'],
          ]);
          $attributes2['from_date'] =  str_replace('-', '', $attributes2['from_date']);
          $attributes2['to_date'] =  str_replace('-', '', $attributes2['to_date']);
          
        
        $auth = array();
        $auth['apiKey'] = 'klfsdjkfkksdj234234';
        $auth['propKey'] = 'hfgtryrt43534sadfsdf';
        
        $data = array();    
        $data['authentication'] = $auth;
        
        /* Restrict the bookings using any combination of the following */
       
        $data['arrivalFrom'] =  $attributes2['from_date'];
        $data['arrivalTo'] = $attributes2['to_date'];
        $data['status'] = '1';

        $json = json_encode($data);
        $url = "https://api.beds24.com/json/getBookings";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        curl_close ($ch);
        $response = json_decode($result);
//get data from Beds24 DB
        $beds = array();
        foreach ($response as $key => $value) {
           $attributes['guestFirstName'] = $value->guestFirstName;
           $attributes['guestName'] = $value->guestName;
           $attributes['unitId'] = $value->unitId ;
           $attributes['roomId'] = $value->roomId ;
           $attributes['firstNight'] = $value->firstNight ;
           $attributes['lastNight'] = $value->lastNight ;
           $attributes['numAdult'] = $value->numAdult ;
           $attributes['price'] = $value->price ;
           $attributes['commission'] = $value->commission ;
           $attributes['referer'] = $value->referer ;
         // dd(Reservation::where('bookId', $value->bookId )->count() == 0);
        if (Reservation::where('bookId', $value->bookId )->count() > 0) {
            session()->flash('error', 'This reservation exists');
            return redirect('reservations');
        } else {
            $attributes['bookId'] = $value->bookId;
        }
           Reservation::create($attributes);
        }
        session()->flash('success', 'Beds24 created');
        session()->flash('type', 'Beds24');

       return redirect('reservations'); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $attributes =  request()->validate([

            'guestFirstName' => ['required ', 'max:255'],
            'guestName' => ['required','max:255'],
            'bookId' => ['required'],
            'roomId' => ['required'],
            'firstNight' => ['required' ],
            'lastNight' => ['required' ],
            'numAdult' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'referer' => ['required' ],
            'payment_method' => ['max:255' ],
            'firm_name' => ['max:255' ],
        ]);
        
        Reservation::create($attributes);
        session()->flash('success', 'Booking created');
        session()->flash('type', 'New Booking');

       return redirect('reservations'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        session()->flash('error', 'Booking Deleted');
        session()->flash('type', 'Booking Deleted');

        return redirect('reservations');
    }
}
