<div class="hiden appear col-md-12 card" id='annual_month_table'>
    <form id="RegisterValidation" action="#" method="">
      <div class="container-fluid">

        <div class="col-md-12">
          <table class="table table-bordered text-center annulschoolreport">
            <div class="justify-content-center">
                <button class="pull-right btn btn-secondary btn-round btn-sm" id="print-annul-fee-report" onclick="printThis('annulschoolreport', '<h3>School Annual Fee Report</h3>')"><i class="fa fa-print"></i></button>
                <h5 class='text-center m-4'>School Annual fee Report<span id='Year'></span></h5>
            </div>

            <thead>
              <tr id='heading'>


              </tr>
            </thead>
            <tbody id='t_body'>

              <thead>
                <th>
                  Month
                </th>
                @php
                $Months= config('constants.Months');


                @endphp


                @if($data['classes'])

                @foreach($data['classes'] as $classe)

                <th>{{$classe->class}}</th>


                @endforeach


                @endif
              </thead>

              <tbody>
                  @php
                    $sum = [];
                  @endphp

                @foreach($Months as $key=>$Month)

                <tr>
                  <td>
                    {{$Month}}


                  </td>


                  @if($data['classes'])




                @foreach($data['classes'] as $classe)

                <td>

                  @php

                    if(isset($data[$key][$classe->cls_Id])){

                      if(!isset($sum[$classe->cls_Id])){

                        $sum[$classe->cls_Id] = $data[$key][$classe->cls_Id];

                      }else{
                        $sum[$classe->cls_Id] = $sum[$classe->cls_Id]+ $data[$key][$classe->cls_Id];
                      }


                     echo number_format($data[$key][$classe->cls_Id]);
                    }
                  @endphp
                  </td>


                @endforeach


                @endif
                </tr>

                @endforeach
                <tr>
                  <td>Total</td>


                  @if($data['classes'])

                   @foreach($data['classes'] as $classe)
                    <td>

                      @php

                      if(isset($sum[$classe->cls_Id])){

                        echo  number_format($sum[$classe->cls_Id]);
                      }else{
                        echo 0;
                      }
                      @endphp

                    </td>
                   @endforeach

                   @endif
                </tr>

              </tbody>
            </table>


        </div>

      </div>

    </form>
</div>
