<?php

$outputs = [];
$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
$outputs=[];

foreach ($StudyCentres as $i => $StudyCentre):
    $output = "<!-- PANEL CONTENT START -->";
    $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.study_centre_id', array(
        'value'=>$StudyCentre['StudyCentre']['id'],
    ));
    $output .= $this->Form->hidden('IntakeStudyCentre.'.$i.'.academic_group_id', array(
        'value'=>$StudyCentre['StudyCentre']['academic_group_id'],
    ));
    if (!isset($StudyCentre['IntakeStudyCentre']['registration_started'])) {
        $StudyCentre['IntakeStudyCentre']['registration_started'] = date("d-m-Y");
    }

    if (!isset($StudyCentre['IntakeStudyCentre']['registration_ended'])) {
        $StudyCentre['IntakeStudyCentre']['registration_ended'] = date("d-m-Y");
    }
    $output .= $StudyCentre['StudyCentre']['name'];
    $output .= '</br><label>Registration started</label>';
    $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_started]', array('value'=>$StudyCentre['IntakeStudyCentre']['registration_started']));
    $output .= '<label>Registration ended</label>';
    $output .= $this->Form->datepicker('data[IntakeStudyCentre]['.$i.'][registration_ended]', array('value'=>$StudyCentre['IntakeStudyCentre']['registration_ended']));
    $output .= "<!-- PANEL CONTENT END -->";
    if (!isset($outputs[$StudyCentre['AcademicGroup']['name']])) {
        $outputs[$StudyCentre['AcademicGroup']['name']] = "";
    }
    $outputs[$StudyCentre['AcademicGroup']['name']].= sprintf($panel, $output);
    $outputs[$StudyCentre['AcademicGroup']['name']].= $this->Form->hidden('IntakeStudyCentre.'.$i.'.id', ['value'=>@$StudyCentre['IntakeStudyCentre']['id']]);
    $outputs[$StudyCentre['AcademicGroup']['name']].= $this->Form->hidden('IntakeStudyCentre.'.$i.'.study_centre_id', ['value'=>@$StudyCentre['StudyCentre']['id']]);

  endforeach;

  foreach ($outputs as $title =>$output) {
      echo " <div class='col-md-12'><h3 align='center'>".h($title)."</h3></div>";
      echo $output;
  }
