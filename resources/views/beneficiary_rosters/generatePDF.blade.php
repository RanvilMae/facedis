<!DOCTYPE html>
<html>
<head>
    <title>BENEFIACIARYY DETAILS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
  
    <table class="table table-bordered" style="width: 100%; display: table; table-layout: fixed;line-height: 14px;font-size: 9px;">
        <tr>
            <th colspan="25" style="text-align: center;">Department of Social Welfare and Development</th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center;">Field Office I</th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center;">Quezon Avenue, City of San Fernando, La Union 2500</th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center;"></th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center;"><strong>RELIEF DISTRIBUTION SHEET DATABASE</strong></th>
        </tr>
        <tr>
            <th colspan="25" style="text-align: center;"><strong>CY 2023</strong></th>
        </tr>
        <tr style="white-space:wrap;">
            <th style="white-space:wrap;">#</th>
            <th style="white-space:wrap;">NAME OF EVENT / NATURE OF AUGMENTATION</th>
            <th style="white-space:wrap;">DATE OF DISTRIBUTION</th>
            <th style="white-space:wrap;">LAST NAME</th>
            <th style="white-space:wrap;">FIRST NAME</th>
            <th style="white-space:wrap;">MIDDLE NAME</th>
            <th style="white-space:wrap;">EXT NAME

Jr., Sr., III, etc.</th>
            <th style="white-space:wrap;">SEX</th>
            <th style="white-space:wrap;">BIRTHDAY
mm/dd/yyyy</th>
            <th style="white-space:wrap;">CURRENT YEAR</th>
            <th style="white-space:wrap;">AGE</th>
            <th style="white-space:wrap;">CIVIL STATUS
 (Single, Married, Separated, Widowed)</th>
            <th style="white-space:wrap;">SECTORS
(Child, Youth, Senior Citizen, PWD, Pregnant, Solo Parent, 4P's Member)</th>
            <th style="white-space:wrap;">Member of Indigenous People 
 (specify)</th>
            <th style="white-space:wrap;">FFP
 (Family Food Pack)</th>
            <th style="white-space:wrap;">HK
 (Hygiene Kit)</th>
            <th style="white-space:wrap;">FK
 (Family Kit)</th>
            <th style="white-space:wrap;">KK
 (Kitchen Kit)</th>
            <th>SK
 (Sleeping Kit)</th>
            <th style="white-space:wrap;">Others
 (Laminated Sacks, Malong, etc.)</th>
            <th style="white-space:wrap;">BARANGAY</th>
            <th style="white-space:wrap;">CITY / MUNICIPALITY</th>
            <th style="white-space:wrap;">PROVINCE</th>
            <th style="white-space:wrap;">CONTROL NUMBER</th>
            <th style="white-space:wrap;">REMARKS</th>
        </tr>
        <?php $counter = 1; ?>
        @foreach($bene as $b)
        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{ $b->type }}</td>
            <td>{{ $b->serial_no }}</td>
            <td>{{ $b->first_name }} {{ $b->middle_name }} {{ $b->last_name }}</td>
            <td>{{ $b->is_4ps_bene }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>
