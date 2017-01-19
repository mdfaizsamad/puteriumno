<!-- KFORCE -->
          <div class="col-md-12">
              <div class='row'>
                <div class='col-md-12'><h3>Study Centre</h3></div>
                <?php
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
                  echo " <div class='col-md-12'><h3 align='center'>K-Force</h3></div>";
                  
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
                  foreach ($studyCentre as $i => $study ) {
                    if($study['StudyCentre']['academic_group_id'] == 1):
                      $output = "<!-- PANEL CONTENT START -->";
                      $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.study_centre_id',array(
                        'value'=>$study['StudyCentre']['id'],
                        ));
                        $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.academic_group_id',array(
                        'value'=>$study['StudyCentre']['academic_group_id'],
                        // 'name'=>'data[IntakeStudyCentre]['.$i.'][id]'
                        ));

                      $registration_started = '';
                      $registration_ended = ''; 
                     
                      $output .= $study['StudyCentre']['name'];
                      $output .= '</br><label>Registration started</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_started]',
                                  array('value'=>$registration_started));
                      $output .= '<label>Registration ended</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_ended]',
                        array('value'=>$registration_ended));
                      $output .= "<!-- PANEL CONTENT END -->";
                      echo sprintf($panel,$output); 
                    endif;
                  
                  }
                ?>
<!-- MAINSTREAM -->
                <?php
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
                  echo " <div class='col-md-12'><h3 align='center'>Mainstream</h3></div>";
                 
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
                  foreach ($studyCentre as $i => $study ) {
                    if($study['StudyCentre']['academic_group_id'] == 2):
                      $output = "<!-- PANEL CONTENT START -->";
                      $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.study_centre_id',array(
                        'value'=>$study['StudyCentre']['id'],
                        // 'name'=>'data[IntakeStudyCentre]['.$i.'][id]'
                        ));
                      $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.academic_group_id',array(
                        'value'=>$study['StudyCentre']['academic_group_id'],
                        // 'name'=>'data[IntakeStudyCentre]['.$i.'][id]'
                        ));

                      $registration_started = '';
                      $registration_ended = ''; 
                     
                      $output .= $study['StudyCentre']['name'];
                      $output .= '</br><label>Registration started</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_started]',
                                  array('value'=>$registration_started));
                      $output .= '<label>Registration ended</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_ended]',
                        array('value'=>$registration_ended));
                      $output .= "<!-- PANEL CONTENT END -->";
                      echo sprintf($panel,$output); 
                    endif;
                  
                  }
                ?>
<!-- BTEC -->
                <?php
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body" >%s</div></div></div>';
                  echo " <div class='col-md-12'><h3 align='center'>BTEC</h3></div>";
                  
                ?>
                <div class='col-md-4'></div>
                <?php
                  $panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
                  foreach ($studyCentre as $i => $study ) {
                    if($study['StudyCentre']['academic_group_id'] == 3):
                      $output = "<!-- PANEL CONTENT START -->";
                      $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.study_centre_id',array(
                        'value'=>$study['StudyCentre']['id'],
                        // 'name'=>'data[IntakeStudyCentre]['.$i.'][id]'
                        ));
                      $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.academic_group_id',array(
                        'value'=>$study['StudyCentre']['academic_group_id'],
                        // 'name'=>'data[IntakeStudyCentre]['.$i.'][id]'
                        ));

                      $registration_started = '';
                      $registration_ended = ''; 
                     
                      $output .= $study['StudyCentre']['name'];
                      $output .= '</br><label>Registration started</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_started]',
                                  array('value'=>$registration_started));
                      $output .= '<label>Registration ended</label>';
                      $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_ended]',
                        array('value'=>$registration_ended));
                      $output .= "<!-- PANEL CONTENT END -->";
                      echo sprintf($panel,$output); 
                    endif;
                  
                  }
                ?>
                 <div class='col-md-4'></div>
            </div>
        </div>   