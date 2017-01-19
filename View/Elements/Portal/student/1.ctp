<style>
.widget-user .widget-user-header {
    height: 60px;
}
.widget-user .widget-user-image {
    top: 0px;
}
</style>

<?php
      $data = $student_info;
      $emergency_first_name = '';
      $emergency_last_name = '' ;
      $emergency_phone = '';
 ?>
<?php foreach ($data['GuardianContact'] as $guardian_contact) {
    if ($guardian_contact['type'] == 'E') {
        $emergency_first_name = ($guardian_contact['first_name'] != '')?$guardian_contact['first_name']:'';
        $emergency_last_name = ($guardian_contact['last_name'] != '')?$guardian_contact['last_name']:'';
        $emergency_phone = ($guardian_contact['phone'] !='')?$guardian_contact['phone']:'';
        $emergency_relay = ($guardian_contact['Relationship']['name'] !='')?$guardian_contact['Relationship']['name']:'';
    } else {
        $emergency_first_name = ($data['GuardianContact'][0]['first_name'] != '')?$data['GuardianContact'][0]['first_name']:'';
        $emergency_last_name = ($data['GuardianContact'][0]['last_name'] != '')?$data['GuardianContact'][0]['last_name']:'';
        $emergency_phone = ($data['GuardianContact'][0]['phone'] !='')?$data['GuardianContact'][0]['phone']:'';
        $emergency_relay = ($data['GuardianContact'][0]['Relationship']['name'] !='')?$data['GuardianContact'][0]['Relationship']['name']:'';
    }
}
?>

<div class="pull-right">
  <a width='100%' href="<?php echo Routed::url(array('controller'=>'portal', 'plugin'=>null, 'action'=>'update_student_info'));?>" align='center' class="btn-xs btn-warning colorBoxIframe" id="add_subject">Update</a>
</div><br>
<div class="row">
            <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <!-- <h3 class="widget-user-username">Alexander Pierce</h3>
              <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
            </div>
            <div class="widget-user-image">
              <!-- <img class="img-circle" src="https://auth.unitar.my/img/no_user_search.png" alt="User Avatar"> -->
              <?php echo $this->Html->image('https://auth.unitar.my/img/no_user_search.png', [
                    'width'=> '50%',
                    'class'=>'img-circle'
                    ]);?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="row">
                    <div class="description-block">
                      <h5 class="description-header">Name</h5>
                      <span class="description-text"><?= h($data['Master']['first_name'].' '.$data['Master']['last_name']) ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <h5 class="description-header">IC / Passport Number</h5>
                      <span class="description-text"><?= h($data['Master']['ic_ppt_no']) ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Matric No</h5>
                        <span class="description-text"><?= ($data['Master']['matric_no'] != '')?$data['Master']['matric_no']:'-' ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Academic Status</h5>
                        <span class="description-text"><?= (!empty($data['MasterStatus'][0]['status_id']))?$status_list[$data['MasterStatus'][0]['status_id']]:'<i>n/a</i>'?></span>
                      </div>
                    </div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <?php
                if (!empty($data['Address'])) {
                    $address_1 = ($data['Address'][0]['address_1'] !='')?$data['Address'][0]['address_1']:' ';
                    $address_2 = ($data['Address'][0]['address_2'] !='')?$data['Address'][0]['address_2']:' ';
                    $address_3 = ($data['Address'][0]['address_3'] !='')?$data['Address'][0]['address_3']:' ';
                    $postcode = ($data['Address'][0]['postcode'] !='')?$data['Address'][0]['postcode']:' ';
                    $town = ($data['Address'][0]['town'] !='')?$data['Address'][0]['town']:' ';
                }
                ?>
                <!-- /.col -->
                <div class="col-sm-6">
                    <div class="description-block">
                      <h5 class="description-header">Address</h5>
                      <span class="description-text">

                        <span><?= $address_1.' '.$address_2 ?></span></br>
                        <?php if ($address_3 != ' ' && !empty($address_3)): ?>
                          <span><?= $address_3 ?></span></br>
                        <?php endif; ?>
                        <span><?= $postcode.' '.$town ?></span>
                      </span>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Nationality</h5>
                        <span class="description-text"><?= ($data['Master']['is_malaysian'] == true)?'Malaysian':'Non-Malaysian' ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Study Mode</h5>
                        <span class="description-text"><?= ($data['Detail']['study_mode'] != '')?$data['Detail']['study_mode']:'-' ?></span>
                      </div>
                    </div>
                  </div>
<!--                   <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Email</h5>
                        <span class="description-text"><?= ($data['Master']['secondary_email'] != '')?$data['Master']['secondary_email']:'-' ?></span>
                      </div>
                    </div>
                  </div> -->

                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          </div>
        </div>

        <div class="pull-right">
          <a width='100%' href="<?php echo Routed::url(array('controller'=>'portal', 'plugin'=>null, 'action'=>'update_guardian_info'));?>" align='center' class="btn-xs btn-warning colorBoxIframe" id="add_subject">Update</a>
        </div><br>
        <div class="row">
          <div class='col-md-12'>
            <div class="box box-warning">
              <div class="box-header with-border"><h3 class="box-title">Parents Info</h3></div>
                <div class='row'>
                <?php if (!empty($data['GuardianContact'][0])): ?>
                  <?php
                        $guardian_first_name_1 = ($data['GuardianContact'][0]['first_name'] !='')?$data['GuardianContact'][0]['first_name']:' - ';
                        $guardian_last_name_1 = ($data['GuardianContact'][0]['last_name'] !='')?$data['GuardianContact'][0]['last_name']:' - ';
                        $relay_1 = (!empty($data['GuardianContact'][0]['Relationship']))?$data['GuardianContact'][0]['Relationship']['name']: ' - ';
                        $contact_1 = ($data['GuardianContact'][0]['mobile'] !='')?$data['GuardianContact'][0]['mobile']:' - ';
                        $occupation_1 = ($data['GuardianContact'][0]['occupations'] !='')?$data['GuardianContact'][0]['occupations']:' - ';
                        $salary_1 = (!empty($data['GuardianContact'][0]['SalaryRange']))?$data['GuardianContact'][0]['SalaryRange']['name']:' - ';

                  ?>
                  <div class='col-md-4'><!-- 2 -->
                    <div class='row'><!-- 1 -->

                      <div class='col-md-4'>
                        <div class="box-body"><b>Name:</b></div>
                      </div>

                      <div class='col-md-8'>
                        <div class="box-body"><?= h($guardian_first_name_1.' '.$guardian_last_name_1) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Relationship:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($relay_1) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Contact No.:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($contact_1) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Occupation:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($occupation_1) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Salary(RM):</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($salary_1) ?></div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($data['GuardianContact'][1])): ?>
                  <?php
                        $guardian_first_name_2 = ($data['GuardianContact'][1]['first_name'] !='')?$data['GuardianContact'][1]['first_name']:' - ';
                        $guardian_last_name_2 = ($data['GuardianContact'][1]['last_name'] !='')?$data['GuardianContact'][1]['last_name']:' - ';
                        $relay_2 = (!empty($data['GuardianContact'][1]['Relationship']))?$data['GuardianContact'][1]['Relationship']['name']: ' - ';
                        $contact_2 = ($data['GuardianContact'][1]['mobile'] !='')?$data['GuardianContact'][1]['mobile']:' - ';
                        $occupation_2 = ($data['GuardianContact'][1]['occupations'] !='')?$data['GuardianContact'][1]['occupations']:' - ';
                        $salary_2 = (!empty($data['GuardianContact'][1]['SalaryRange']))?$data['GuardianContact'][1]['SalaryRange']['name']:' - ';
                  ?>
                  <div class='col-md-4'><!-- 2 -->
                    <div class='row'><!-- 1 -->

                      <div class='col-md-4'>
                        <div class="box-body"><b>Name:</b></div>
                      </div>

                      <div class='col-md-8'>
                        <div class="box-body"><?= h($guardian_first_name_2.' '.$guardian_last_name_2) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Relationship:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($relay_2) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Contact No.:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($contact_2) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Occupation:</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($occupation_2) ?></div>
                      </div>
                    </div>
                    <div class='row'><!-- 1 -->
                      <div class='col-md-4'>
                        <div class="box-body"><b>Salary(RM):</b></div>
                      </div>
                      <div class='col-md-8'>
                        <div class="box-body"><?= h($salary_2) ?></div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                </div>
              </div>
            </div>
          </div>



<div class="row">

        <div class="col-md-6">

            <div class="pull-right">
              <a width='100%' href="<?php echo Routed::url(array('controller'=>'portal', 'plugin'=>null, 'action'=>'update_contact_info'));?>" align='center' class="btn-xs btn-warning colorBoxIframe" id="add_subject">Update</a>
            </div><br>
            <div class="box box-warning collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">CONTACT</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                          <li><span class='stacked'><strong>Phone No:</strong>&nbsp;<?= h($data['Master']['phone']);?></span></li>
                          <li><span class='stacked'><strong>Email:</strong>&nbsp;<?= h($data['Master']['secondary_email']);?></span></li>

                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        <div class="pull-right">
          <a width='100%' href="<?php echo Routed::url(array('controller'=>'portal', 'plugin'=>null, 'action'=>'update_emergency_info'));?>" align='center' class="btn-xs btn-warning colorBoxIframe" id="add_subject">Update</a>
        </div><br>
        <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">EMERGENCY CONTACT</h3>
              <div class="box-tools">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <li><span class='stacked'><strong>Name:</strong>&nbsp;<?= h($emergency_first_name.' '.$emergency_last_name) ?></span></li>
                      <li><span class='stacked'><strong>Relationship:</strong>&nbsp;<?= h($emergency_relay) ?></span></li>
                      <li><span class='stacked'><strong>Phone No:</strong>&nbsp;<?= h($emergency_phone);?></span></li>
                    </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </div><!-- /.col -->
    <div class="col-md-6">
            <div class="pull-right"></div><br>
            <div class="box box-warning collapsed-box">
              <div class="box-header with-border ">
                <h3 class="box-title">WORKING EXPERIENCE</h3>
                          <div class="box-tools">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          </div>
              </div><!-- /.box-header -->
                <div class="box-footer">
                  <table class='table'>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Specialitization</th>
                        <th>Responsibilities</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($data['WorkingExperience'])) {
    ?>
                    <?php foreach ($data['WorkingExperience'] as $i => $WorkingExperience):?>
                    <tr>
                      <td>
                        <?= $i+1;
    ?>
                      </td>
                      <td class='main-column2'>
                        <?= (!empty($WorkingExperience['company_name']))?h($WorkingExperience['company_name']):'N/A';
    ?>
                      </td>
                      <td class='main-column2'>
                        <?= (!empty($WorkingExperience['dt_start']))?CakeTime::nice($WorkingExperience['dt_start']):'N/A';
    ?>
                      </td>
                      <td class='main-column2'>
                        <?= (!empty($WorkingExperience['dt_end']))?CakeTime::nice($WorkingExperience['dt_end']):'N/A';
    ?>
                      </td>
                      <td class='main-column2'>
                        <?= (!empty($WorkingExperience['specialitization']))?h($WorkingExperience['specialitization']):'N/A';
    ?>
                      </td>
                      <td class='main-column2'>
                        <?= (!empty($WorkingExperience['responsibilities']))?h($WorkingExperience['responsibilities']):'N/A';
    ?>
                      </td>
                    </tr>
                  <?php endforeach;
    ?>
                  <?php
} else {
    ?>
                    <tr><td colspan="6" align="center">No record on working experience</td></tr>
                  <?php
} ?>
                </tbody>
                  </table>
                </div><!-- /.box-footer -->
            </div><!-- /. box -->
            <div class="pull-right"> </div><br>
            <div class="box box-warning collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">SPONSORSHIP</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                       <li><span class='stacked'><strong>Sponsored By:</strong>&nbsp;<?= h($data['SponsoredBy'][0]['Sponsorship']['name']);?></span></li>
                       <li><span class='stacked'><strong>Amount:</strong>&nbsp;<?= h($data['SponsoredBy'][0]['amount']);?></span></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->


    <div class="col-md-1"></div>
