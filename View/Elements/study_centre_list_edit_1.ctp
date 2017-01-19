<!-- KFORCE -->
<div class="col-md-12">
    <div class='row'>
	<div class='col-md-12'><h3>Study Centre</h3></div>
	<?php

	debug($this->request->data);
	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	echo " <div class='col-md-12'><h3 align='center'>K-Force</h3></div>";
	foreach ($intakeStudyCentreEdit as $i => $study) {

	    if ($study['StudyCentre']['academic_group_id'] == 1) {
		$output = $this->Form->hidden("IntakeStudyCentre.$i.study_centre_id");
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
		echo $this->Form->hidden("IntakeStudyCentre.$i.id");
	    }
	}

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	foreach ($studyCentre as $i => $study) {
	    if ($study['StudyCentre']['academic_group_id'] == 1):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
	    endif;
	}
	?>
	<!-- MAINSTREAM -->
	<?php

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	echo " <div class='col-md-12'><h3 align='center'>Mainstream</h3></div>";
	foreach ($intakeStudyCentreEdit as $i => $study) {

	    if ($study['StudyCentre']['academic_group_id'] == 2) {
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
		echo $this->Form->hidden('IntakeStudyCentre.' . $i . '.id', ['value' => $study['IntakeStudyCentre']['id']]);
	    }
	}

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	foreach ($studyCentre as $i => $study) {
	    if ($study['StudyCentre']['academic_group_id'] == 2):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
	    endif;
	}
	?>
	<!-- BTEC -->
	<?php

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body" >%s</div></div></div>';
	echo " <div class='col-md-12'><h3 align='center'>BTEC</h3></div>";
	foreach ($intakeStudyCentreEdit as $i => $study) {

	    if ($study['StudyCentre']['academic_group_id'] == 3):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
		echo $this->Form->hidden('IntakeStudyCentreEdit.' . $i . '.id', ['value' => $study['IntakeStudyCentre']['id']]);
	    endif;
	}
	?>
	<div class='col-md-4'></div>
	<?php

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	foreach ($studyCentre as $i => $study) {
	    if ($study['StudyCentre']['academic_group_id'] == 3):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_started']");
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker("data['IntakeStudyCentre'][$i]['registration_ended']");
		echo sprintf($panel, $output);
	    endif;
	}
	?>
	<div class='col-md-4'></div>
    </div>
</div>