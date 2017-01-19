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




<?php
      $sort_lecturer = [];
      foreach ($senarai_lecturer as $data) {
        $id = $data['lecturer_id'];
        if($id == $lecturer_id)
        {
            if (isset($sort_lecturer[$id])) {
               $sort_lecturer[$id][] = $data;
            } else {
               $sort_lecturer[$id] = array($data);
            }
        }
      }

      $sorted=[];
      foreach($senarai_lecturer as $unsorted) {
         if($unsorted['lecturer_id'] == $lecturer_id)
           $sorted[$unsorted['Course']['faculty_id']][$unsorted['semester_id']][] = $unsorted;
      }
      $empty = true;
if(!empty($sorted)):
foreach ($sorted as $faculty_key => $level_1):
         $course_list  =  [];
?>

  <div class="box box-success">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse"><?= $faculties[$faculty_key] ?></h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">      
      <?php foreach($level_1 as $semester_key => $level_2): ?>
        <div class="box box-danger collapsed-box">

                <div class="box-header with-border">
                    <h2 class="box-title" data-widget="collapse"><?= $level_2[0]['semester_name'] ?></h2>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">  


      <table class='table'>
          <tr>
            <th width='30%'>Lecturer Name</th>
            <th width='30%'>Position</th>
            <th width='30%'>Course</th>
            <th width='30%'>Credit Hour</th>
            <th width='30%'>CL</th>
            <th width='30%'>Tutor</th>
            <th width='10%'>Credit Earned</th>
          <tr>
          <?php $grand_total=0 ?>
          <?php $lec_no = ''; ?>
                                                 
          <?php foreach($sort_lecturer as $lecturer_key => $lecturer):  ?>
              <?php foreach($lecturer as $lec): ?>
                <?php if($lec['semester_id'] == $semester_key): ?> <!-- jika semester id dia sama, baru output kan dia -->
                    <?php $check_CL = ($lec['course_leader_id']==$lec['lecturer_id'])?'<p align="center"><i class="fa fa-check"></i></p>':'<p align="center"><i class="fa fa-close"></i></p>'; ?>
                    <?php $check_tutor = ($lec['section_no']!='')?'<p align="center"><i class="fa fa-check"></i></p>':'<p align="center"><i class="fa fa-close"></i></p>'; ?>

                    <?php if(!in_array($lec['course_id'], $course_list)): ?> 
                    <?php $course_list[] = $lec['course_id']; ?>
                      <?php $grand_total = $grand_total + $lec['total_credit_hour'] ?>
                        <?php if($lec_no != $lec["lecturer_id"] ): ?>
                            <tr>
                                <td><?= $lec['fullname'] ?></td>
                                <td align='center'><?= $lec['lecturer_type'] ?></td>
                                <td><?= $lec['Course']['course_code'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$lec['Course']['course_name'] ?></td>
                                <td align='center'><?= $lec['Course']['credit_hours'] ?></td> 
                                <td><?= $check_CL ?></td>
                                <td><?= $check_tutor ?></td>
                                <td align='center'><?= $lec['total_credit_hour'] ?></td> 
                            </tr>
                            
                        <?php else: ?>
                            <tr>
                                <td></td>
                                <td align='center'></td>
                                <td><?= $lec['Course']['course_code'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$lec['Course']['course_name'] ?></td>
                                <td align='center'><?= $lec['Course']['credit_hours'] ?></td> 
                                <td><?= $check_CL ?></td>
                                <td><?= $check_tutor ?></td>
                                <td align='center'><?= $lec['total_credit_hour'] ?></td> 
                            </tr>

                        <?php endif; ?>


                        <?php $lec_no = $lec['lecturer_id'] ?>
                        
                     <?php endif; ?>
                <?php endif; ?>


                    
              <?php endforeach; ?>      
              <?php if($lec_no == $lec["lecturer_id"] ): ?>
                <?php $balance = 0; ?>   
                <?php $balance = $lec['entitled'] - $grand_total ?>      
                <tr>
                  <td align='right' colspan=3><b>Total approved credit hour</b> &nbsp;&nbsp;&nbsp;<?php echo $grand_total ?></td>
                  <td align='center'><b>Entitled</b></td>
                  <td align='center'><?= $lec['entitled'] ?></td>
                  <td align='right'><b>Balance</b></td>
                  <td align='center'><?= $balance ?></td>
                </tr>
                <?php $course_list = []; ?>
                <?php $grand_total=0 ?>
              <?php endif; ?>
        <?php endforeach; ?>

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