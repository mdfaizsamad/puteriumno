<!-- STUDENT OUTSTANDING PAYMENT -->
<?php $data = $finance_info;?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Program Fees</h3>
    </div>
    <!-- /.box-header -->
    <!-- <table class="table table-condensed"> -->
        <table style="text-align :center;" class="table table-condensed">
            <tr>
                <th>Date</th>
                <th>Transaction No</th>
                <th width='20%'>Transaction Type</th>
                <th width='20%'>Description</th>
                <th width='10%'>Debit (RM)</th>                          
                <!-- <th width='5%'>Receipt</th> -->
            </tr>   
            <?php foreach ($data['StuTransaction'] as $index => $transaction): ?>
                <?php
                if ($transaction['balance'] != '0') {
                    $bill = @$transaction['StuKnock'][0]['Bill'];
                    if ($transaction['entry_type'] == 'debit' && $transaction['amount'] != '0') {
                        if ($transaction['entry_type'] == 'debit') {
                            if (@$transaction['fee_type_id'] == 1 || @$transaction['fee_type_id'] == 4 || @$transaction['fee_type_id'] == 8 || @$transaction['fee_type_id'] == 9) {
                                ?>
                                <tr>
                                    <td><?= date('d-m-Y', strtotime($transaction['modified'])) ?></td>
                                    <td><?= $transaction['transaction_no'] ?></td>
                    <?php if ($transaction['trx_type_id'] != 2): ?>
                                        <td>Billing</td>
                                        <td><?= $transaction['FeeType']['name'] ?></td>
                                        <td><?= number_format($transaction['amount'], 2, '.', ','); ?></td>

                                    <?php
                                    endif;
                                } //end is_soa
                            } //end entry type
                        }
                    }
                    ?> 
                    <?php
                    ?>
                </tr>
<?php endforeach; ?>
            <!-- subtotal row -->
            <tr bgcolor="#bdd5ef">
            <hr style="margin-right:0">
            <td align='right' colspan=4><b>SUBTOTAL</b></td>
            <td style='color:black'><strong>
                <?php
                $balanceDebit = 0;
                foreach ($data['StuTransaction'] as $transaction) {
                    if ($transaction['balance'] !== '0') {
                        if (@$transaction['fee_type_id'] == 1 || @$transaction['fee_type_id'] == 4 || @$transaction['fee_type_id'] == 8 || @$transaction['fee_type_id'] == 9) {
                            if ($transaction['entry_type'] == 'debit' && @$transaction['FeeType']['is_soa_reflected'] == 1 && $transaction['amount'] != '0') {
                                $balanceDebit = $balanceDebit + $transaction['amount'];
                            }//end if debit
                        }
                    }
                }//END FOREACH
                //echo $balanceDebit;
                echo number_format($balanceDebit, 2, '.', ',');
                ?>
            </strong></td>
            </tr>
        </table>
    </div>
    <!-- /.box-body -->

