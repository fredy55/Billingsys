@extends('admin.layouts.invoices')

<!-- Website title -->
@section('title', $compinfo['ctname'].' | Client Receipt'.$bllinfo[0]->bill_no)

@section('contents')
<header class="clearfix">
    <div id="logo">
      @if ($compinfo->img_url!=="nil")
        <img alt="avatar" src="{{ asset($compinfo->img_url) }}" alt="Company Logo" width="185px"/>
      @else
          <img alt="avatar" src="{{ asset('img/brand/logo.png') }}" alt="Company Logo" width="185px"/>
      @endif
    </div>
    <div id="company">
      <h2 class="name">{{ $compinfo['ctname'] }}</h2>
      <div>{{ $compinfo['addressln1'] }}, {{ $compinfo['city'] }}, {{ $compinfo['state'] }}, {{ $compinfo['country'] }}</div>
      <div>{{ $compinfo['phone_no'] }}</div>
      <div><a href="#">{{ $compinfo['email'] }}</a></div>
    </div>
    </div>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">ISSUED TO:</div>
        <h2 class="name">{{ $client['ctname'] }}</h2>
        <div class="address">{{ $client['addressln1'] }}, {{ $client['city'] }}, {{ $client['state'].' State' }}, {{ $client['country'] }}</div>
        <div class="email"><a href="#">{{ $client['email'] }}</a></div>
      </div>
      <div id="invoice">
        <img src="data:image/png;base64,{{ $barcode}}" alt="barcode" />
        <h1>RECEIPT {{ $bllinfo[0]->bill_no }}</h1>
        <div class="date"><strong>Receipt Date:</strong> {{ Carbon\Carbon::parse($bllinfo[0]->created_at)->format('d-m-Y') }}</div>
        {{-- <div class="date">Due Date: {{ Carbon\Carbon::parse($bllinfo[0]->bill_no)->format('d-m-Y') }}</div> --}}
      </div>
    </div>

    <table style="border: 0;" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">S/N</th>
          <th class="desc">DESCRIPTION</th>
          <th class="unit">UNIT PRICE</th>
          <th class="qty">QUANTITY</th>
          <th class="total">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i=0;
        @endphp

        @foreach ($billitems as $item)
         <tr>
            <td class="no">{{ ++$i }}</td>
            <td class="desc">
                <h3>{{ $item->sname }}</h3>
                <i>{{ $item->description }}</i>
            </td>
            <td class="unit">&#8358;{{ number_format($item->price,2) }}</td>
            <td class="qty">{{ $item->quantity }}</td>
            <td class="total">&#8358;{{ number_format($item->total,2) }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">TAX:</td>
          <td>&#8358;{{ number_format(0,2) }}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">GRAND TOTAL:</td>
          <td>&#8358;{{ number_format($bllinfo[0]->total_amt,2) }}</td>
        </tr>
        @if ($bllinfo[0]->balance==0)
          <tr>
            <td colspan="2"></td>
            <td colspan="2">AMOUNT PAID:</td>
            <td>&#8358;{{ number_format($bllinfo[0]->amt_paid,2) }}</td>
          </tr>
        @endif
      </tfoot>
    </table>
    {{-- <div id="thanks">Thank you for your patronage!</div> --}}
    <div id="notices">
      <div>NOTICE:</div>
      <div class="notice">This invoice is generated from our company billing system. Thank you for your patronage!</div>
    </div>
  </main>
  <footer>
    Invoice was created on a computer and is valid without the signature and seal.
  </footer>
@endsection