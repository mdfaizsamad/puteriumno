<div class="row">
  <div class="col-xs-12">
    <div class="box-header">
      <div class="filters pull-right" >


      </div>
    </div><!-- /.box-header -->

  <div class="pull-right">
    <a width='100%' href="<?php echo Routed::url('/marks_breakdown/search_leader')?>" align='center' class="btn-sm btn-info colorBoxIframe" id="search-leader">Search</a>
  </div><br>
  <div class="box box-default">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse">Role: Course Leader</h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body"> 

<?php
$sorted=[];

foreach($course_leader_data as $unsorted) {

  if(isset($unsorted['CourseOffDetail']) && !empty($unsorted['CourseOffDetail'])):
    if(isset($unsorted['CourseOffDetail']['CourseOffMaster']) && !empty($unsorted['CourseOffDetail']['CourseOffMaster'])):
      if(isset($unsorted['CourseOffDetail']['CourseOffMaster']['Semester']) && !empty($unsorted['CourseOffDetail']['CourseOffMaster']['Semester'])):
            $sorted[@$unsorted['CourseOffDetail']['CourseOffMaster']['aca_group_id']][@$unsorted['CourseOffDetail']['CourseOffMaster']['aca_timeline_id']][@$unsorted['CourseOffDetail']['CourseOffMaster']['Semester']['name'].' '.@$unsorted['CourseOffDetail']['CourseOffMaster']['Semester']['year']][] = $unsorted;
      endif;
    endif;
  endif;  
}

foreach ($sorted as $academic_key => $level_1):

?>

  <div class="box box-primary">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse"><?= $academicGroups[$academic_key] ?></h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">      
      <?php foreach($level_1 as $timeline_key => $level_2): ?>
        <div class="box box-danger collapsed-box">

                <div class="box-header with-border">
                    <h2 class="box-title" data-widget="collapse"><?= $timelines[$timeline_key] ?></h2>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                    </div>
                </div>
        <div class="box-body">  

  
                        <?php $i = 1 ?>
                        <?php foreach($level_2 as $semester_key => $level_3):  ?>
                            <div class="box box-success">
                              <div class="box-header with-border">
                                  <h3 class="box-title" data-widget="collapse"><?= $semester_key ?></h3>
                                  <div class="box-tools">
                                      <button class="btn btn-box-tool" data-widget="collapse" id="<?= $i ?>"><i class="fa fa-minus"></i></button>
                                  </div>
                              </div>

                              <div class="box-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                          <tr>
                                              <th width="5%"><?php echo "Course Code"; ?></th>
                                              <th width="15%"><?php echo "Course Name"; ?></th>
                                              <th width="15%"   align="center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($level_3 as $level_4): ?>
                                          <tr>
                                            <td align='center'><?= $level_4['Course']['course_code'] ?></td>
                                            <td><?= $level_4['Course']['course_name'] ?></td>
                                            <td align='center'>
                                              <!-- button view -->
                                                <?php if($level_4['CourseOffCourse']['is_course_mark_breakdown_confirm'] == true):   ?>
                                                <a href="<?php echo Routed::url('/marks_breakdown/view/'.$level_4['CourseOffCourse']['id'])?>"  class="btn btn-info btn-xs colorBoxIframe"><i class="fa fa-eye"></i> View Course Mark Breakdown</a>
                                                <?php endif; ?>
                                                <?php if($level_4['CourseOffCourse']['is_course_mark_breakdown_confirm'] == false ):   ?>
                                                <!-- button edit marks breakdown -->
                                                <a href="<?php echo Routed::url('/marks_breakdown/add/'.$level_4['CourseOffCourse']['id'])?>"  class="btn btn-success btn-xs "><i class="fa fa-pencil"></i> Set Course Mark Breakdown</a>
                                                <?php endif;  ?>
                                                <!-- button view student marks based on lecturer -->
                                                <a href="<?php echo Routed::url(array('plugin'=>'assessment','controller'=>'course_mark_breakdowns','action'=>'course_view',$level_4['CourseOffCourse']['id']))?>"  class="btn btn-warning btn-xs "><i class="fa fa-eye"></i> Course Marks</a>
                                                <a href="<?php echo Routed::url(array('plugin' => 'assessment', 'controller' => 'course_off_courses', 'action' => 'view', $level_4['CourseOffCourse']['id'])); ?>" class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Print Cover Page</a> 
                                            </td>
                                          </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>

                               </div>
                            </div>
                            <?php $i++ ?>

          <?php endforeach; ?>
        </div>
       </div>
      <?php endforeach; ?>
    </div>
  </div>

<?php endforeach; ?>
    </div>
  </div>

  <div class="pull-right">
    <a width='100%' href="<?php echo Routed::url('/marks_breakdown/search_lecturer')?>" align='center' class="btn-sm btn-info colorBoxIframe" id="search-lecturer">Search</a>
  </div><br>
  <div class="box box-default">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse">Role: Tutor</h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body"> 
<?php
$sorted=[];

foreach($section_all as $unsorted) {
  if(isset($unsorted['CourseOffCourse']) && !empty($unsorted['CourseOffCourse'])):
    if(isset($unsorted['CourseOffCourse']['CourseOffDetail']) && !empty($unsorted['CourseOffCourse']['CourseOffDetail'])):
      if(isset($unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']) && !empty($unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster'])):
        if(isset($unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester']) && !empty($unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester'])):

    $sorted[$unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_group_id']][$unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_timeline_id']][$unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester']['name'].' '.$unsorted['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester']['year']][] = $unsorted;
        endif;
      endif;
    endif; 
  endif; 
}

foreach ($sorted as $academic_key => $level_1):

?>

  <div class="box box-primary">

    <div class="box-header with-border">
        <h2 class="box-title" data-widget="collapse"><?= $academicGroup_lec[$academic_key] ?></h2>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">      
      <?php foreach($level_1 as $timeline_key => $level_2): ?>
        <div class="box box-danger collapsed-box">

                <div class="box-header with-border">
                    <h2 class="box-title" data-widget="collapse"><?= $timeline_lec[$timeline_key] ?></h2>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                    </div>
                </div>
        <div class="box-body">  

                        <?php $i = 1 ?>
                        <?php foreach($level_2 as $semester_key => $level_3):  ?>
                            <div class="box box-success">
                              <div class="box-header with-border">
                                  <h3 class="box-title" data-widget="collapse"><?= $semester_key ?></h3>
                                  <div class="box-tools">
                                      <button class="btn btn-box-tool" data-widget="collapse" id="<?= $i ?>"><i class="fa fa-minus"></i></button>
                                  </div>
                              </div>

                              <div class="box-body">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                          <tr>
                                              <th width="10%"><?php echo "Course Code"; ?></th>
                                              <th width="30%"><?php echo "Course Name"; ?></th>
                                              <th width="5%">Section</th>
                                              <th width="10%"   align="center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($level_3 as $level_4): ?>
                                          <tr>
                                            <td align='center'><?= $level_4['CourseOffCourse']['Course']['course_code'] ?></td>
                                            <td><?= $level_4['CourseOffCourse']['Course']['course_name'] ?></td>
                                            <td align='center'><?= $level_4['Section']['section_no'] ?></td>
                                            <td align='center'>
                                              <!-- button view -->
                                                <a href="<?php echo Routed::url('/marks_breakdown/view/'.$level_4['CourseOffCourse']['id'])?>"  class="btn btn-info btn-xs colorBoxIframe"><i class="fa fa-eye"></i> View Course Mark Breakdown</a>
                                                <!-- button add student marks -->
                                                <a href="<?php echo Routed::url(array('plugin'=>'assessment','controller'=>'course_mark_breakdowns','action'=>'view_details',$level_4['CourseOffCourse']['id'],0,$lecturer_id))?>"  class="btn btn-warning btn-xs colorBoxIframe"><i class="fa fa-eye"></i> Student Marks</a>
                                            </td>
                                          </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>

                               </div>
                            </div>
                            <?php $i++ ?>

          <?php endforeach; ?>
        </div>
       </div>
      <?php endforeach; ?>
    </div>
  </div>

<?php endforeach; ?>

    </div>
  </div>