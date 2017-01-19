<?php $data = $finance_info;?>
<style type="text/css">
.vertical {
  vertical-align: text-top;
}
table, th, td {
   border: 1px solid #E5E7E9;
}
</style>
<div class="col-md-12">
    <!-- MAP & BOX PANE -->
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Finance Information</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">

            <div class="row">
                <div class="col-md-12">
                    <div class="pad">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">Name</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo preg_replace('/([^a-z\']|^)([a-z])/ie', '"$1".strtoupper("$2")', strtolower($data['Master']['first_name'])). ' ' .preg_replace('/([^a-z\']|^)([a-z])/ie', '"$1".strtoupper("$2")', strtolower($data['Master']['last_name'])); ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">Matric Number</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $data['Master']['matric_no']; ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">IC / Passport</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $data['Master']['ic_ppt_no']; ?></div>
                            </div>
                            <div class="box-header with-border">
                                <?php $intake_name = $data['Detail']['Intake']; ?>
                                <h3 style="font-size: 15px;" class="box-title">Intake / Semester</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $intake_name['name']; ?></div>
                            </div>
                            <div class="box-header with-border">
                                <?php $program_name = $data['Detail']['Program']; ?>
                                <h3 style="font-size: 15px;" class="box-title">Program</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $program_name['name']; ?></div>
                            </div>
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">Study Type</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo ($data['Master']['is_malaysian'] == "true") ? "Local Student" : "International Student" ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <?php $study_centre = $data['Detail']['StudyCentre']; ?>
                                <h3 style="font-size: 15px;" class="box-title">Study Centre</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $study_centre['name']; ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <?php $faculty = $data['Detail']['Program']; ?>
                                <h3 style="font-size: 15px;" class="box-title">Faculty</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php echo $faculty['Faculty']['name']; ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">Amount Fees (RM)</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php
                                    $amount_fees = 0;
                                    foreach ($data['StuTransaction'] as $index => $transaction) {
                                        if ($transaction['entry_type'] == 'debit') {
                                            $amount_fees = $amount_fees + $transaction['amount'];
                                        }
                                    }
                                    echo number_format($amount_fees, 2, '.', ',');
                                    ?>
                                </div>
                            </div>
                            <div class="box-header with-border">
                                <h3 style="font-size: 15px;" class="box-title">Amount Paid (RM)</h3>
                                <div class="col-md-9 box-tools">
                                    <div class="col-md-1 box-tools">:</div>
                                    <?php
                                    $amount_paid = 0;
                                    foreach ($data['StuTransaction'] as $index => $transaction) {
                                        if ($transaction['entry_type'] == 'credit') {
                                            $amount_paid = $amount_paid + $transaction['amount'];
                                        }
                                    }
                                    echo number_format($amount_paid, 2, '.', ',');
                                    ?>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#outstanding">Outstanding</a></li>
                            <li><a data-toggle="tab"  href="#payment">Payment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="outstanding" class="tab-pane fade in active">
                                <h4>OUTSTANDING</h4>
                                <?= $this->element("Portal/student/3-1"); ?>  <!-- outstanding -->
                            </div>
                            <div id="payment" class="tab-pane fade">
                                <h4>PAYMENT</h4>
                                <?= $this->element("Portal/student/3-2"); ?>
                                <div class="box-tools">
                                <center><a class="btn btn-info colorBoxIframe" href="<?php echo Routed::url(array(
                                    'controller'=>'masters',
                                    'plugin'=>'student',
                                    'action'=>'statement_stu_finance', $data['Master']['id'], 'program'));?>" ><i class="fa fa-print"></i>&nbsp;Print Statement </a></center><br />
                                </div>
                                <?= $this->element("Portal/student/3-3"); ?>
                                <div class="box-tools">
                                <center><a class="btn btn-info colorBoxIframe" href="<?php echo Routed::url(array(
                                    'controller'=>'masters',
                                    'plugin'=>'student',
                                    'action'=>'statement_stu_finance', $data['Master']['id'], 'others'));?>" ><i class="fa fa-print"></i>&nbsp;Print Statement </a></center><br />
                                    </div>
                                <div class="box-tools">
                                <div class="box box-primary"></div><br />
                                <center><a class="btn btn-info colorBoxIframe" href="<?php echo Routed::url(array(
                                    'controller'=>'masters',
                                    'plugin'=>'student',
                                    'action'=>'statement_stu_finance', $data['Master']['id'], 'all'));?>" ><i class="fa fa-print"></i>&nbsp;Print All </a></center><br />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.col -->
            <?php //$this->element('Portal/2info');?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.box-body -->
</div>

<?php

$this->Js->buffer(
"$('.nav-tabs a').click(function(e){
    window.location.hash=$(this).attr('href');
});
if(window.location.hash === '#payment'){
  $('.nav-tabs a[href=\'#payment\']').tab('show');
  document.getElementById('showhere').scrollIntoView();
}
");

?>
