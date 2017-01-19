<style>
    .no-margin { margin: 0; }
    .table th { background: #999; color: #fff; text-align: center; }
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box-header">
      <div class="filters pull-right" >

<!--         <a target='_blank' href="<?php echo Router::url('/lecturer/teaching_workload_pdf/')?>" 
                            class="btn btn-info"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Export to PDF</a> -->
<!--           <a href="<?php echo Routed::url(array('controller'=>'lecturer_masters','plugin'=>'lecturer','action'=>'search_teaching_workload'))?>" class="btn btn-info colorBoxIframe"><i class="fa fa-search"></i>&nbsp;Search Criteria</a> -->
      </div>
    </div><!-- /.box-header -->

<?php //debug($sections); ?>


<?php


      $sorted=[];
      foreach($sections as $unsorted) {
           $sorted[$unsorted['CourseOffCourse']['Course']['Faculty']['name']][$unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_semester_id']][] = $unsorted;
      }
      $empty = true;
     
if(!empty($sorted)):
foreach ($sorted as $faculty_key => $level_1):
         $course_list  =  [];
?>

  <div class="box box-default">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse"><?= $faculty_key ?></h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">      
      <?php foreach($level_1 as $semester_key => $level_2):  ?>
        <div class="box box-primary collapsed-box">

                <div class="box-header with-border">
                    <h2 class="box-title" data-widget="collapse"><?= $sem[$semester_key] ?></h2>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">  


      <table class='table'>
          <tr>

            <th width='30%'>Course</th>
            <th width='30%'>Section</th>
            <th>Credit Hour</th>
            <th>CL</th>
            <th>Tutor</th>
            <th>Credit Earned</th>
          <tr>
          <?php $grand_grand_total=0 ?>
          <?php $grand_total=0 ?>
          <?php $balance = 0; ?>
          <?php $lec_course = ''; ?>
                                                 
          <?php foreach($level_2 as $lecturer_key => $lecturer):  ?>
             
                
                    <?php $check_CL = ($lecturer['CourseOffCourse']['course_leader_id']==$lecturer_id)?'<p align="center"><i class="fa fa-check"></i></p>':'<p align="center"><i class="fa fa-close"></i></p>'; ?>
                    <?php $check_tutor = ($lecturer['Section']['section_no']!='')?'<p align="center"><i class="fa fa-check"></i></p>':'<p align="center"><i class="fa fa-close"></i></p>'; ?>

                      <?php foreach($lecturer['Lecturer']['LecturerDetail'] as $lecturer_detail)
                            {
                              if($lecturer_detail['aca_group_id'] == $lecturer['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_group_id'])
                                $max_teaching_hour = $lecturer_detail['max_teaching_hour'];
                            }
                      ?>
                      <?php if($lecturer['CourseOffCourse']['course_leader_id']==$lecturer_id)
                              $grand_total = $grand_total + $lecturer['CourseOffCourse']['credit_hour'];  ?>
                      <?php $grand_total = $grand_total + $lecturer['Section']['credit_hour'] ?>
                      

                            <tr>
                                <td><?= $lecturer['CourseOffCourse']['Course']['course_code'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$lecturer['CourseOffCourse']['Course']['course_name'] ?></td>
                                <td align='center'><?= $lecturer['Section']['section_no'] ?></td>
                                <td align='center'><?= $lecturer['Section']['credit_hour'] ?></td> 
                                <td><?= $check_CL ?></td>
                                <td><?= $check_tutor ?></td>
                                <td align='center'><?= $grand_total ?></td> 
                            </tr>

                         <?php $lec_course = $lecturer['CourseOffCourse']['Course']['id'] ?>
                      <?php $grand_grand_total = $grand_grand_total + $grand_total ?>
                      <?php $grand_total = 0 ?>
                         
          <?php endforeach; ?> 
              
               <?php if($lec_course == $lecturer['CourseOffCourse']['Course']['id'] ): ?>   
                <?php $balance = 0; ?>   
                <?php $balance = $max_teaching_hour - $grand_grand_total ?>      
                <tr>
                  <td align='right' colspan=2><b>Entitled</b> &nbsp;&nbsp;&nbsp;<?php echo $max_teaching_hour   ?></td>
                  <td align='right'><b>Total approved credit hour</b></td>
                  <td align='left'><?= $grand_grand_total?></td>
                  <td align='right'><b>Balance</b></td>
                  <td align='center'><?= $balance ?></td>
                </tr>
                <?php $course_list = []; ?>
                <?php $grand_grand_total=0 ?>
              <?php endif; ?>
              
        

    </table>

                </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

<?php endforeach; ?>
<?php else: ?>
<div class='box'>
  <div class='box-body'>
    <h4 align='center'>No record found..</h4>
  </div>
</div>
<?php endif; ?>

                 <div class="col-md-12">
                    <div class="col-md-5"></div>
                    <div class="col-md-4">
                      <div class="form-actions">
                        
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>