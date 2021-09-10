<body style=" padding-left: 5px;padding-right: 5px;padding-top: 0px;padding-bottom: 0px;">
<table   style="width: 100%;margin: 0;padding: 0px; border-spacing:0;    ">
  <tr>
    <td style="width: 70%;margin: 0px;">
      <h3 style="color: blue;font-style: italic;">Quotation</h3>
      <p style="line-height:0.5px">INOVICE NO: #{{@$proposal->id}}</p>
      <p style="line-height:0.5px">DATE: <?php echo $dt->format('jS F Y'); ?></p>
      <p style="line-height:0.5px">VALIDATY: <?php echo $dtt; ?></p>
    </td>
    <td style="width: 30%;vertical-align: top;text-align: right;margin: 0px;">
      <img style="width: 50%" src="{{ asset('storage/app/public/adminfiles/'.@$logo->field_value)}}" class="card-img-top">
    </td>
  </tr>
  <tr>
    <td style="width: 50%;vertical-align: top;margin: 0px;">
      <h5 style="color: blue;">By</h5>
      <p style="line-height:0.5px"><b>{{@$company_details[0]['field_value']}}</b></p>
      <p style="line-height:0.5px">{{@$company_details[1]['field_value']}}</p>
      <p style="line-height:0.5px">{{@$company_details[2]['field_value']}}</p>
      <p style="line-height:0.5px">{{@$company_details[3]['field_value']}}</p>
      <p style="line-height:0.5px">{{@$company_details[4]['field_value']}}</p>
      <p style="line-height:0.5px">{{@$company_details[5]['field_value']}}</p>
      <p style="line-height:0.5px">{{@$company_details[6]['field_value']}}</p>
    </td>
    <td style="width: 50%;vertical-align: top;margin: 0px;">
      <h5 style="color: blue;">To</h5>
      <p style="line-height:0.5px"><b>{{$proposal->lead->company_name}}</b></p>
      <p style="line-height:0.5px">{{$proposal->lead->address->address_line_1}}</p>
      <p style="line-height:0.5px">{{$proposal->lead->address->address_line_2}}</p>
      <p style="line-height:0.5px">MOBILE:{{$proposal->lead->phone}}</p>
      <p style="line-height:0.5px">GSTIN:{{$proposal->lead->gstin}}</p>
      <p style="line-height:0.5px">LANDLINE:{{$proposal->lead->landline}}</p>
      <p style="line-height:0.5px">Instruction:{{$proposal->message}}</p>
    </td>
  </tr>
  <tr>
    <td style="width: 100%;margin: 0px;" colspan="2" >
      <table   border="1" style="width: 100%;margin: 0;padding: 0px;border: 1px solid #3d3d29;border-collapse: collapse;">
        <tr style="width: 100%;background-color: blue; color: white;">
          <th style="width: 40%;color: white;font-weight: bolder;">Description</th>
          <th style="width: 20%;color: white;font-weight: bolder;">Quantity</th>
          <th style="width: 20%;color: white;font-weight: bolder;">Rate</th>
          <th style="width: 20%;color: white;font-weight: bolder;">Amount</th>
        </tr>
        <?php
        $totalamount = 0;
        $amountwithTax = 0;
        ?>
        @if (count($products) != 0)
          @if(count($products) < 5)
            @foreach ($products as $product)
              <?php
                $totalamount = $totalamount + ($product['product_price'] * $product['product_qty']);
                $amountwithTax = $amountwithTax + ($product['product_amount']);
              ?>
              <tr class="">
                <td style="margin-top:0px;">{{@$product['product_name']}}</td>
                <td style="margin-top:0px;">{{@$product['product_qty']}}</td>
                <td style="margin-top:0px;"> {{@$product['product_price']}}</td>
                <td style="margin-top:0px;">{{@$proposal->currency->symbol}}{{($product['product_price'] * $product['product_qty'])}}</td>
              </tr>
            @endforeach
            @for($i = 0;$i < (5 - count($products));$i++))
            <tr>
              <td style=""><span style="color: transparent">a</span></td>
              <td style="margin-top:0px;"></td>
              <td style="margin-top:0px;"></td>
              <td style="margin-top:0px;"></td>
            </tr>
            @endfor
          @else
            @foreach ($products as $product)
              @php
                $totalamount = $totalamount + ($product['product_price'] * $product['product_qty']);
                $amountwithTax = $amountwithTax + ($product['product_amount']);
              @endphp
              <tr class="">
                <td style="margin-top:0px;">{{@$product['product_name']}}</td>
                <td style="margin-top:0px;">{{@$product['product_qty']}}</td>
                <td style="margin-top:0px;"> {{@$product['product_price']}}</td>
                <td style="margin-top:0px;">{{@$proposal->currency->symbol}}{{(@$product['product_price'] * $product['product_qty'])}}</td>
              </tr>
            @endforeach
          @endif
        @else
          <tr>
            <td style="margin: 0px;"><span style="color: transparent">a</span></td>
            <td style="margin-top:0px;"></td>
            <td style="margin-top:0px;"></td>
            <td style="margin-top:0px;"></td>
          </tr>
          <tr>
            <td style="margin: 0px;"><span style="color: transparent">a</span></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
          </tr>
          <tr>
            <td style="margin: 0px;"><span style="color: transparent">a</span></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
          </tr>
          <tr>
            <td style="margin: 0px;"><span style="color: transparent">a</span></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
            <td style="margin-top:0px;margin: 0px;"></td>
          </tr>
        @endif
      </table>
    </td>

  </tr>
  <tr>
    <td style="width: 70%;vertical-align: top;margin: 0px;">
      <p style="color: blue;position: relative;"><b>Terms & Conditions</b></p>
      <table   style="width: 100%;margin: 0;padding: 0px; border-spacing:0;    ">
        <tr>
          <td style="width: 65%;margin: 0px;font-size: 14px;">
{{--      <ol style="font-size: 14px;">--}}
        <li>{{@$terms->field_value}}</li>
        <li>{{@$terms1->field_value}}</li>
        <li>{{@$terms2->field_value}}</li>
        <li>{{@$terms3->field_value}}</li>
        <li>{{@$terms4->field_value}}</li>


            {{--        <li>Please fax or mail the signed price quote to the address Above.</li>--}}
{{--        <li>Payment will be due prior to Delivery of Service and Goods.</li>--}}
{{--        <li>Payment 100 % Advance.</li>--}}
{{--        <li>Includes Transportation Charges.</li>--}}
{{--        <li>Warranty Period Valid for 1 Year Only.</li>--}}
{{--      </ol>--}}
          </td>
        </tr>
      </table>
    </td>
    <td style="width: 30%;vertical-align: top;margin: 0px;">
      <p style="line-height:0.5px"><b>Sub Total</b>: {{$totalamount}}</p>

      <p style="line-height:0.5px"><b>Tax</b>: {{$amountwithTax - $totalamount}}</p>
      <p style="line-height:0.5px"><b>Discount:</b>: {{@$proposal->discountTotal}} ({{@$proposal->total_discount_percentage}} %)</p>
      <p style="line-height:0.5px"><b>Total</b>: {{@$proposal->totalAmount}}</p>
{{--      <?php--}}
{{--      $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);--}}


{{--      ?>--}}
{{--      <p ><b><?php echo ucfirst($f->format($proposal->totalAmount)) ?> Only</b></p>--}}

    </td>
  </tr>
  <tr>
    <td style="width: 70%;vertical-align: top;margin: 0px;">
      <p style="color: blue;position: relative;top:20px;"><b>Banking Information</b></p>
      <table   style="width: 100%;margin: 0;padding: 0px; border-spacing:0;    ">
        <tr>
          <td style="width: 65%;margin: 0px;font-size: 14px;">
            <ul style="list-style: none;padding-left: 0px;margin-left: 0px">
              <li>Bank - HDFC Bank, A/C No 50200018035048</li>
              <li>IFSC Code - HDFC0000478</li>
              <li>Payment should be made only by A/C Payee</li>
              <li>Cheque/Draft/NEFT/RTGS.</li>
            </ul><br>
            <p style="line-height:0.5px">Customer Acceptance (signature blow):</p><br>
            <p style="line-height:0.5px">X____________________________________</p>
          </td>
          <td style="width: 35%;margin: 0px;">
            <img style="width: 70%" src="{{asset('images/barcode.gif')}}" class="card-img-top">
          </td>
        </tr>
      </table>
    </td>
    <td style="width: 30%;text-align: center">
      <h1 style="width: 100%;color:blue;font-size: 150%">Total Amount &nbsp; &nbsp; &nbsp; &nbsp;{{$totalamount}}</h1>
      <span style="">Invoice Total (in words)</span><br>
      <span style="width: 100%;font-weight: 1000;">One Lakh Rupees Only</span><br>
      <span style="width: 100%;font-weight: 1000;">Hhhhhhhhhhhh!</span><br><br>
      <span style="width: 100%;font-weight: bold;color: blue; font-size: 150%">THANK YOU FOR</span><br>
      <span style="width: 100%;font-weight: bold;color: blue; font-size: 150%">THE &nbsp; BUSINESS !</span>

    </td>
  </tr>

</table>
<p style="width: 100%;text-align: center;">If YOU HAVE ANY QUESTIONS ABOUT THE PRICE QUOTE, PLEASE CONTACT MR JASIWAL, +918981224400</p>
<table   style="width: 100%;margin: 0;padding: 0px; border-spacing:0;">
  <tr>
    <td style="width: 20%;margin:0px;"><img height="40" style="width: 100%" src="{{ asset('storage/app/public/adminfiles/'.@$logo1->field_value)}}" class="card-img-top"></td>
    <td style="width: 16.6%;margin:0px;"><img  style="width: 100%" src="{{ asset('storage/app/public/adminfiles/'.@$logo2->field_value)}}" class="card-img-top"></td>
    <td style="width: 20%;"><img style="width: 100%"src="{{ asset('storage/app/public/adminfiles/'.@$logo3->field_value)}}" class="card-img-top"></td>
    <td style="width: 15%;margin:0px;"><img style="width: 100%" src="{{ asset('storage/app/public/adminfiles/'.@$logo4->field_value)}}" class="card-img-top"></td>
    <td style="width: 12%;margin:0px;"><img style="width: 100%"src="{{ asset('storage/app/public/adminfiles/'.@$logo5->field_value)}}" class="card-img-top"></td>
    <td style="width: 20%;margin:0px;"><img style="width: 100%"src="{{ asset('storage/app/public/adminfiles/'.@$logo6->field_value)}}" class="card-img-top"></td>

  </tr>
</table>


</body>