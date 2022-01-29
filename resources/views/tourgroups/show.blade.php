@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tour Groups</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tour Groups</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{ $tourgroup->tourgroup_name }}
                    <small class="float-right">{{ \Carbon\Carbon::parse(now())->format('d/m/Y')}}
                    </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>{{ $tourgroup->tourgroup_country }}</strong><br>
                    <strong>{{ __('Tour Group Pax') }}:</strong>  {{ $tourgroup->tourgroup_pax }}<br>
                    <strong>{{ __('Arrival in Date:') }}</strong>  {{ $tourgroup->tourgroup_ci }}<br>
                    <strong>{{ __('Departure Date:') }}</strong>  {{ $tourgroup->tourgroup_co }}<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-hotel"></i> {{ __('Hotel Reservations') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>City</th>
                      <th>Name</th>
                      <th>Arrival Date</th>
                      <th>Departure Date</th>
                      <th>Early CI</th>
                      <th>Late CO</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($hotels as $item )
                    <tr>
                      <td>{{ $item->hotel_city }}</td>
                      <td>{{ $item->hotel_name }}</td>
                      <td>{{ $item->checkin_date }}</td>
                      <td>{{ $item->checkout_date }}</td>
                      <td>{{ $item->early_checkin }}</td>
                      <td>{{ $item->late_checkout }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              @if ( $transports_auto->count() )
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-car"></i> {{ __('Transportation - Auto') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Auto</th>
                      <th>Car Make</th>
                      <th>Transport Goal</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Driver Name</th>
                      <th>Driver Phone</th>
                      <th>Date Time</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($transports_auto as $item )
                    <tr>
                      <td>{{ $item->auto_type }}</td>
                      <td>{{ $item->car_make }}</td>
                      <td>{{ $item->pickup_or_dropoff_or_marshrut }}</td>
                      <td>{{ $item->pickup_or_dropoff_from }}</td>
                      <td>{{ $item->pickup_or_dropoff_to }}</td>
                      <td>{{ $item->driver_name }}</td>
                      <td>{{ $item->driver_tel }}</td>
                      <td>{{ $item->pickup_or_dropoff_date_time }}</td>
                      <td>{{ $item->transport_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              @endif
              
              @if ( $transports_air->count() )
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-plane"></i> {{ __('Transportation - Air') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Ticket Class</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Date Time</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($transports_air as $item )
                    <tr>
                      <td>{{ $item->air_ticket_class }}</td>
                      <td>{{ $item->pickup_or_dropoff_from }}</td>
                      <td>{{ $item->pickup_or_dropoff_to }}</td>
                      <td>{{ $item->pickup_or_dropoff_date_time }}</td>
                      <td>{{ $item->transport_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
            @endif
            @if ( $transports_train->count() )
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-train"></i> {{ __('Transportation - Train') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Ticket Class</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Date Time</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($transports_train as $item )
                    <tr>
                      <td>{{ $item->train_name }}</td>
                      <td>{{ $item->train_ticket_class }}</td>
                      <td>{{ $item->pickup_or_dropoff_from }}</td>
                      <td>{{ $item->pickup_or_dropoff_to }}</td>
                      <td>{{ $item->pickup_or_dropoff_date_time }}</td>
                      <td>{{ $item->transport_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
            @endif
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-people-arrows"></i> {{ __('Guides') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Tel</th>
                      <th>Language</th>
                      <th>Extra Info</th>
                      <th>Guide Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($guides as $item )
                    <tr>
                      <td>{{ $item->guide_name }}</td>
                      <td>{{ $item->guide_phone }}</td>
                      <td>{{ $item->guide_lang }}</td>
                      <td>{{ $item->guide_extra_info }}</td>
                      <td>{{ $item->guide_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-utensils"></i> {{ __('Restaurants') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Location</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Date Time</th>
                      <th>Extra Info</th>
                      <th>Restaurants Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($restaurants as $item )
                    <tr>
                      <td>{{ $item->restaurant_city }}</td>
                      <td>{{ $item->restaurant_name }}</td>
                      <td>{{ $item->restaurant_tel }}</td>
                      <td>{{ $item->book_date_time }}</td>
                      <td>{{ $item->extra_info_restaurant }}</td>
                      <td>{{ $item->restaurant_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-ticket-alt"></i> {{ __('Tickets') }}
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Location</th>
                      <th>Name</th>
                      <th>Voucher name</th>
                      <th>Date</th>
                      <th>Extra Info</th>
                      <th>Restaurants Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $item )
                    <tr>
                      <td>{{ $item->ticket_location }}</td>
                      <td>{{ $item->monument_name }}</td>
                      <td>{{ $item->voucher_number }}</td>
                      <td>{{ $item->ticket_date }}</td>
                      <td>{{ $item->ticket_extra_info }}</td>
                      <td>{{ $item->ticket_status }}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                 

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </section>
  <!-- /.content -->
</div>

  



@endsection