<!-- KFORCE -->
<div class="col-md-12">
    <div class='row'>
	<div class='col-md-12'><h3>Study Centre</h3></div>
	<?php

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	echo " <div class='col-md-12'><h3 align='center'>K-Force</h3></div>";

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';

	debug($this->request->data['IntakeStudyCentre']);
	foreach ($this->request->data['IntakeStudyCentre'] as $i => $study) {
	    if (!empty(debug($this->request->data['IntakeStudyCentre']))) {
		$this->request->data['IntakeStudyCentre'][$this->request->data['IntakeStudyCentre'][$study['id']]] =	    }
	    foreach ($studyCentre as $sc_keys => $sc_values) {
		if ($sc_values['StudyCentre']['academic_group_id'] === '1'):

		    $date_started = (!empty($this->request->data['IntakeStudyCentre'][$i]['registration_started'])) ? $this->request->data['IntakeStudyCentre'][$i]['registration_started'] : '';
		    $date_ended = (!empty($this->request->data['IntakeStudyCentre'][$i]['registration_ended'])) ? $this->request->data['IntakeStudyCentre'][$i]['registration_ended'] : '';
		    debug($this->request->data['IntakeStudyCentre'][$i]['registration_started']);
		    $output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id', array('value' => $sc_values['StudyCentre']['id']));
		    $output .= $this->Form->hidden('IntakeStudyCentre.' . $i . '.id');
		    $output .= $sc_values['StudyCentre']['name'];
		    $output .= '</br><label>Registration started</label>';
		    $output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_started]', ['value' => $date_started]);
		    $output .= '<label>Registration ended</label>';
		    $output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_ended]', ['value' => $date_ended]);
		    echo sprintf($panel, $output);
		endif;
	    }
	}
	?>
	<!-- MAINSTREAM -->
	<?php

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	echo " <div class='col-md-12'><h3 align='center'>Mainstream</h3></div>";

	$panel = '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">%s</div></div></div>';
	foreach ($studyCentre as $i => $study) {
	    if ($study['StudyCentre']['academic_group_id'] == 2):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id', array('value' => $study['StudyCentre']['id']));
		$output .= $this->Form->hidden('IntakeStudyCentre.' . $i . '.id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_started]');
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_ended]');
		echo sprintf($panel, $output);
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
	foreach ($studyCentre as $i => $study) {
	    if ($study['StudyCentre']['academic_group_id'] == 3):
		$output = $this->Form->hidden('IntakeStudyCentre.' . $i . '.study_centre_id', array('value' => $study['StudyCentre']['id']));
		$output .= $this->Form->hidden('IntakeStudyCentre.' . $i . '.id');
		$output .= $study['StudyCentre']['name'];
		$output .= '</br><label>Registration started</label>';
		$output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_started]');
		$output .= '<label>Registration ended</label>';
		$output .= $this->Form->datepicker('data[IntakeStudyCentre][' . $i . '][registration_ended]');
		echo sprintf($panel, $output);
	    endif;
	}
	?>
	<div class='col-md-4'></div>
    </div>
</div>