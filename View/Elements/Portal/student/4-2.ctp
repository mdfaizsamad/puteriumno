<div class="box  box-warning collapsed-box">

            <div class="box-header with-border">
              <h3 class="box-title">Alumni</h3>
              <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="pad">
                <div class='status' style='padding-bottom:10px;'>
                  <span style='font-weight:bold'>Room No : </span><span>A-001-D</span></br>
                  <span style='font-weight:bold'>Rental Type : </span><span>Student</span></br>
                  <span style='font-weight:bold'>Room Type : </span><span>Deluxe</span></br>
                  <span style='font-weight:bold'>Status : </span><span>Active</span></br>
                  <span style='font-weight:bold'>Occupied Start : </span><span>05/01/2016</span></br>
                  <span style='font-weight:bold'>Occupied End : </span><span>05/01/2017</span></br>
                </div>

                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Statement</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Month</th>
                        <th>Bill Type</th>
                        <th>Amount(RM)</th>
                        <th>Status</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                      <?php for ($i=0;$i<5;$i++):

                        if ($i!=4) {
                            $back = 5-$i;
                            $int= strtotime("$back months");
                            if ($i == 0) {
                                $type ="Rental / Deposit";
                                $amt = "350.00";
                            } else {
                                $type ="Rental";
                                $amt = "200.00";
                            }
                            $status = "Paid";
                        } else {
                            $int=  strtotime("now");
                            $type ="Rental";
                            $amt = "200.00";
                            $status = "Unpaid";
                        }
                        ?>
                        <tr>
                          <td><?=date('M Y', $int)?></td>
                          <td><?=$type;?></td>
                          <td><?=$amt;?></td>
                          <td><?=$status;?></td>
                          <td><?php if ($i==4):?><a href="#" class='btn btn-warning btn-xs'>Pay</a><?php endif;?></td>
                        </tr>

                      <?php endfor;?>

                  </tbody></table>
                </div>
                <!-- /.box-body -->
                </div>


                </div>
              </div>

            <!-- /.box-body -->
<!--             <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div> -->
          </div>
