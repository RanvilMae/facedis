<!DOCTYPE html>
<html>
<head>
    <title>DISASTER ASSISTANCE FAMILY ACCESS CARD (DAFAC)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@page{
    margin: 0px;
}
.container {
  position: relative;
  text-align: center;
  color: black;
}

.top-left {
  position: absolute;
  top: 60;
  left: 126px;
}

</style>
</head>
<body>


<div class="container">
      <img src="{{ url('images/DAFACpage1.webp') }}" alt="FACED CARD" style="width:100%;">
      <div style="position: absolute;top: 54px;left: 390px;font-size: 7px;"><strong>{{$bene->serial_no}}</strong></div>
      <div style="position: absolute;top: 88px;left: 82px;font-size: 10px;">1</div>
      <div style="position: absolute;top: 108px;left: 82px;font-size: 10px;">{{$province->province_m}}</div>
      <div style="position: absolute;top: 90px;left: 345px;font-size: 10px;">{{$citymun->citymun_m}}</div>
      <div style="position: absolute;top: 108px;left: 345px;font-size: 10px;">{{$brgy->barangay_m}}</div>
      <div style="position: absolute;top: 163px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$bene->last_name}}</div>
      <div style="position: absolute;top: 179px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$bene->first_name}}</div>
      <div style="position: absolute;top: 196px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$bene->middle_name}}</div>
      <div style="position: absolute;top: 212px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$bene->ext_name}}</div>
      <div style="position: absolute;top: 229px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$bene->bday}}</div>
      <?php 
        $year = date('Y');
        $bdy = date_create($bene->bday);
        $bdayyear = date_format($bdy, "Y");
        $age = $year - $bdayyear;
        ?>
      <div style="position: absolute;top: 245px;left: 89px;text-transform: uppercase;font-size: 10px;" >{{$age}}</div>


      <div style="position: absolute;top: 163px;left: 347px;text-transform: uppercase;font-size: 10px;" >{{$bene->civil_status}}</div>
      <div style="position: absolute;top: 196px;left: 347px;text-transform: uppercase;font-size: 10px;" >@if($religion != NULL){{$religion->name}}@endif</div>
      <div style="position: absolute;top: 213px;left: 347px;text-transform: uppercase;font-size: 10px;" >{{$bene->occupation}}</div>
      <div style="position: absolute;top: 228px;left: 347px;text-transform: uppercase;font-size: 10px;" >{{$bene->monthly_net}}</div>
      <div style="position: absolute;top: 305px;left: 288px;font-size: 8px;" >{{$brgy->barangay_m}}</div>
      <div style="position: absolute;top: 305px;left: 345px;font-size: 8px;" >{{$citymun->citymun_m}}</div>
      <div style="position: absolute;top: 305px;left: 419px;font-size: 8px;" >{{$province->province_m}}</div>
    @if($bene->sex == 'Male')
      <div style="position: absolute;top: 265px;left: 89px;font-size: 30px;" >&#x2022;</div>
    @else
      <div style="position: absolute;top: 265px;left: 149px;font-size: 30px;" >&#x2022;</div>
    @endif

    @if($bene->is_4ps_bene == 'Yes')
      <div style="position: absolute;top: 315px;left: 89px;font-size: 30px;" >&#x2022;</div>
    @endif

    <?php $counter = 385; ?>
    @foreach($fam_members as $f)
      <div style="position: absolute;top: {{$counter}}px;left: 31px;font-size: 8px;" >{{$f->first_name}} {{$f->last_name}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 118px;font-size: 8px;" > {{$f->rel_hh}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 254px;font-size: 8px;" >{{$f->gender}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 282px;font-size: 8px;" >{{$f->educ}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 370px;font-size: 8px;" >{{$f->skill}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 416px;font-size: 8px;word-wrap: break-word; width: 60px;" >{{$f->remarks}}</div>
      <?php $counter = $counter+23; ?>
    @endforeach

    @if($bene->house_ownership == 'House & lot owner')
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'Rented house & lot')
      <div style="position: absolute;top: 664px;left: 121px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner & lot renter')
      <div style="position: absolute;top: 664px;left: 230px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner rent-free lot with owners consent')
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner rent-free lot w/o consent of the owner')
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @else
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @endif

    @if($bene->house_cond == 'Partially Damaged')
      <div style="position: absolute;top: 664px;left: 308px;font-size: 20px;" >&#x2022;</div>
    @else
      <div style="position: absolute;top: 664px;left: 389px;font-size: 20px;" >&#x2022;</div>
    @endif

    <!-- 2nd COpy -->
     <div style="position: absolute;top: 54px;left: 919px;font-size: 7px;"><strong>{{$bene->serial_no}}</strong></div>
      <div style="position: absolute;top: 88px;left: 612px;font-size: 10px;">1</div>
      <div style="position: absolute;top: 108px;left: 612px;font-size: 10px;">{{$province->province_m}}</div>
      <div style="position: absolute;top: 90px;left: 875px;font-size: 10px;">{{$citymun->citymun_m}}</div>
      <div style="position: absolute;top: 108px;left: 875px;font-size: 10px;">{{$brgy->barangay_m}}</div>
      <div style="position: absolute;top: 163px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$bene->last_name}}</div>
      <div style="position: absolute;top: 179px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$bene->first_name}}</div>
      <div style="position: absolute;top: 196px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$bene->middle_name}}</div>
      <div style="position: absolute;top: 212px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$bene->ext_name}}</div>
      <div style="position: absolute;top: 229px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$bene->bday}}</div>
      <?php 
        $year = date('Y');
        $bdy = date_create($bene->bday);
        $bdayyear = date_format($bdy, "Y");
        $age = $year - $bdayyear;
        ?>
      <div style="position: absolute;top: 245px;left: 620px;text-transform: uppercase;font-size: 10px;" >{{$age}}</div>


      <div style="position: absolute;top: 163px;left: 876px;text-transform: uppercase;font-size: 10px;" >{{$bene->civil_status}}</div>
      <div style="position: absolute;top: 196px;left: 876px;text-transform: uppercase;font-size: 10px;" >@if($religion != NULL){{$religion->name}}@endif</div>
      <div style="position: absolute;top: 213px;left: 876px;text-transform: uppercase;font-size: 10px;" >{{$bene->occupation}}</div>
      <div style="position: absolute;top: 228px;left: 876px;text-transform: uppercase;font-size: 10px;" >{{$bene->monthly_net}}</div>
      <div style="position: absolute;top: 305px;left: 816px;font-size: 8px;" >{{$brgy->barangay_m}}</div>
      <div style="position: absolute;top: 305px;left: 876px;font-size: 8px;" >{{$citymun->citymun_m}}</div>
      <div style="position: absolute;top: 305px;left: 942px;font-size: 8px;" >{{$province->province_m}}</div>
    @if($bene->sex == 'Male')
      <div style="position: absolute;top: 265px;left: 620px;font-size: 30px;" >&#x2022;</div>
    @else
      <div style="position: absolute;top: 265px;left: 679px;font-size: 30px;" >&#x2022;</div>
    @endif

    @if($bene->is_4ps_bene == 'Yes')
      <div style="position: absolute;top: 315px;left: 620px;font-size: 30px;" >&#x2022;</div>
    @endif

    <?php $counter = 385; ?>
    @foreach($fam_members as $f)
      <div style="position: absolute;top: {{$counter}}px;left: 562px;font-size: 8px;" >{{$f->first_name}} {{$f->last_name}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 646px;font-size: 8px;" > {{$f->rel_hh}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 783px;font-size: 8px;" >{{$f->gender}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 813px;font-size: 8px;" >{{$f->educ}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 900px;font-size: 8px;" >{{$f->skill}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 947px;font-size: 8px;word-wrap: break-word; width: 60px;" >{{$f->remarks}}</div>
      <?php $counter = $counter+23; ?>
    @endforeach

    @if($bene->house_ownership == 'House & lot owner')
      <div style="position: absolute;top: 664px;left: 598px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'Rented house & lot')
      <div style="position: absolute;top: 664px;left: 651px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner & lot renter')
      <div style="position: absolute;top: 664px;left: 598px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner rent-free lot with owners consent')
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @elseif($bene->house_ownership == 'House owner rent-free lot w/o consent of the owner')
      <div style="position: absolute;top: 664px;left: 598px;font-size: 20px;" >&#x2022;</div>

    @else
      <div style="position: absolute;top: 664px;left: 68px;font-size: 20px;" >&#x2022;</div>

    @endif

    @if($bene->house_cond == 'Partially Damaged')
      <div style="position: absolute;top: 664px;left: 838px;font-size: 20px;" >&#x2022;</div>
    @else
      <div style="position: absolute;top: 664px;left: 389px;font-size: 20px;" >&#x2022;</div>
    @endif

    <?php $counter = 65; ?>
      <img src="{{ url('images/DAFACpage2.webp') }}" alt="FACED CARD" style="width:100%;">
    @foreach($assistance_records as $ar)
    <?php $ddate = date('d M Y'); ?>
      <div style="position: absolute;top: {{$counter}}px;left: 18px;text-transform: uppercase;font-size: 8px;white-space:wrap;width:15px;" >{{$ddate}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 58px;text-transform: uppercase;font-size: 10px;white-space:wrap;width:30px;" >{{$bene->first_name}} {{$bene->last_name}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 144px;text-transform: uppercase;font-size: 10px;" >{{$ar->kind_type}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 264px;text-transform: uppercase;font-size: 10px;" >{{$ar->unit}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 305px;text-transform: uppercase;font-size: 10px;" >{{$ar->qty}}</div>
      <div style="position: absolute;top: {{$counter}}px;left: 351px;text-transform: uppercase;font-size: 10px;" ><?php echo number_format($ar->cost,'2') ?></div>
      <div style="position: absolute;top: {{$counter}}px;left: 394px;text-transform: uppercase;font-size: 10px;" >{{$ar->provider}}</div>
      <?php $counter = $counter+50; ?>
    @endforeach

    <?php $counter1 = 65; ?>
    @foreach($assistance_records as $ar)
     <?php $ddate = date('d M Y'); ?>
      <div style="position: absolute;top: {{$counter1}}px;left: 548px;text-transform: uppercase;font-size: 8px;white-space:wrap;width:15px;" >{{$ddate}}</div>
      <div style="position: absolute;top: {{$counter1}}px;left: 590px;text-transform: uppercase;font-size: 10px;white-space:wrap;width:30px;" >{{$bene->first_name}} {{$bene->last_name}}</div>
      <div style="position: absolute;top: {{$counter1}}px;left: 675px;text-transform: uppercase;font-size: 10px;" >{{$ar->kind_type}}</div>
      <div style="position: absolute;top: {{$counter1}}px;left: 798px;text-transform: uppercase;font-size: 10px;" >{{$ar->unit}}</div>
      <div style="position: absolute;top: {{$counter1}}px;left: 833px;text-transform: uppercase;font-size: 10px;" >{{$ar->qty}}</div>
      <div style="position: absolute;top: {{$counter1}}px;left: 884px;text-transform: uppercase;font-size: 10px;" ><?php echo number_format($ar->cost,'2')?></div>
      <div style="position: absolute;top: {{$counter1}}px;left: 929px;text-transform: uppercase;font-size: 10px;" >{{$ar->provider}}</div>
      <?php $counter1 = $counter1+50; ?>
    @endforeach
</div>


</body>
</html> 
