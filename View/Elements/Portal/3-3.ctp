<!-- STUDENT OTHER FEES -->
<?php $data = $finance_info;  
$balance=0;
$master_id = $finance_info['Master']['id'];?>
<?php
      $balance_programfee = 0;
      foreach($data['StuTransaction'] as $transaction){ 
        if($transaction['entry_type'] == 'debit' && $transaction['TransactionType']['id'] == 1){
           if(@$transaction['FeeType']['is_soa_reflected'] == true){
              $balance_programfee+=floatval($transaction['amount']);
           }
        }elseif($transaction['entry_type'] == 'credit' && $transaction['TransactionType']['id'] == 2){
          if(@$transaction['StuKnock'][0]['Bill']['FeeType']['is_soa_reflected'] == true){
            $balance_programfee-=floatval($transaction['amount']);
          }
        }
      }
      // $balance_programfee = CakeNumber::currency($balance_programfee,'',['zero'=>'','negative'=>'-']);
?>
<div class="box box-primary">
        <h4 class="box-title">Other Fees</h4>
      <table class='table hover' id='showhere'>
                        <thead>
                        <tr>
                            <th style='vertical-align: text-top;' width='10%'>Date</th>
                            <th style='vertical-align: text-top;' width='15%'>Transaction No</th>
                            <th width='10%'>Transaction Type</th>
                            <th style='vertical-align: text-top;' width='20%'>Description</th>
                            <th width='7%'>Debit (RM)</th>
                            <th width='7%'>Credit (RM)</th> 
                            <th width='8%'>Balance (RM)</th>
                            <th style='vertical-align: text-top;' width='8%'>Bill Status</th>                        
                            <th style='vertical-align: text-top;' width='25%'>Details</th>
                        </tr>   
                        </thead>
                        <tbody>
                <?php
                  $empty = 1;
                  $balancing = 0;
                  foreach($data['StuTransaction'] as $transaction) : ?>

                    <?php if($transaction['entry_type'] == 'debit' && $transaction['TransactionType']['id'] == 1) : //debug($data['StuTransaction']);die;?>
                        <?php if(@$transaction['FeeType']['is_soa_reflected'] == false) : 
                        $empty = 0;
                    ?>
                        <tr>
                            <td><?= date('d-m-Y',strtotime($transaction['modified'])) ?></td>
                            <td>INV<?= preg_replace("/[^0-9.]/", "", $transaction['transaction_no']); ?></td>
                            <?php if($transaction['trx_type_id'] != 2 ): ?>
                                <td>Billing</td>
                                <td><?= $transaction['FeeType']['name'] ?></td>
                                <td><?php 
                                    $balancing+= floatval($transaction['amount']);
                                    echo CakeNumber::currency($transaction['amount'],''); 
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                  <span <?=($balancing < 0)?"style='color:red'":""?> >
                                      <?= CakeNumber::currency($balancing,'',['zero'=>'','negative'=>'-'])?>
                                  </span>
                                </td>
                            <?php endif; ?>
                            <?php
                               if($transaction['balance'] == 0){
                                  echo '<td><strong>Close</strong></td>';
                                }else{
                                  echo '<td><strong>Open</strong></td>';
                                }
                            ?>
                            <?php
                                $master_id =$transaction['stu_master_id'];
                                $other_url=Router::url(array('plugin'=>'finance','controller'=>'finance_masters','action'=>'payment_invoice',$master_id,$transaction['id']));

                                // $url=Router::url(array('plugin'=>'finance','controller'=>'finance_masters','action'=>'payment_invoice',$master_id,$transaction['id']));
                                 if($transaction['balance'] != 0){
                                  echo '<td><a  href="'. $other_url.'" class="btn btn-info btn-xs colorBoxIframe" id="FormOnSubmit">Print</a>'.'</td>';
                                }
                            ?>
                        </tr>
                        <?php endif; ?>
                    <?php elseif($transaction['entry_type'] == 'credit' && $transaction['TransactionType']['id'] == 2) : ?> 
                        <?php if(@$transaction['StuKnock'][0]['Bill']['FeeType']['is_soa_reflected'] == false) : ?>
                        <tr>
                        <?php 
                            $master_id =$transaction['stu_master_id'];
                            $balancing-=floatval($transaction['amount']); 

                            $other_url=Router::url(array('plugin'=>'finance','controller'=>'finance_masters','action'=>'payment_invoice',$master_id,$transaction['id']));
                            // $other_url2=Router::url(array('plugin'=>'finance','controller'=>'finance_masters','action'=>'payment_details',$master_id,$transaction['id']));
                            // $other_url3=Router::url(array('plugin'=>'finance','controller'=>'finance_masters','action'=>'payment_invoice',$master_id,$transaction['id']));
                            
                              echo '<td>'.date('d-m-Y',strtotime($transaction['modified'])).'</td>';
                              echo '<td>'.$transaction['transaction_no'].'</td>';
                              echo '<td>Payment</td>';
                              if($transaction['PaymentType']['name'] == 'Cash') :
                                echo '<td>'.$transaction['PaymentType']['name'].'</td>';
                              else :
                                echo '<td>'.$transaction['PaymentType']['name'].'- '.$transaction['ref_no'].'</td>';
                              endif;
                              echo '<td></td>';
                              echo '<td>'.CakeNumber::currency($transaction['amount'],'').'</td>';
                              echo '<td><span';
                              echo ($balancing < 0)?" style='color:red'":"";
                              echo '>'.CakeNumber::currency($balancing,'',['zero'=>'','negative'=>'-']).'</span></td>';
                              echo '<td></td>';
                              // echo '<td>'.'<a  href="'. $other_url3.'" class="btn btn-warning btn-xs colorBoxIframe" id="FormOnSubmit">Invoice</a>'.'&nbsp';
                              echo '<td><a  href="'. $other_url.'" class="btn btn-info btn-xs colorBoxIframe" id="FormOnSubmit">Print</a>'.'&nbsp;</td>';
                              // echo '<a  href="'. $other_url2.'" class="btn btn-primary btn-xs colorBoxIframe" id="FormOnSubmit">View</a>'.'</td>';
                        ?>
                        </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if($empty == 1): ?>
                        <tr bgcolor="#bdd5ef"><td colspan="9"><center><strong>No Billing for Other Fees</strong></center></td></tr>
                <?php endif; ?>
                </tbody>
                <?php if($empty != 1): ?>
                <tr bgcolor="#bdd5ef">
                  <hr style="margin-right:0">
                  <td colspan=4 align="right"><b>Sub Total</b></td>
                    <td>
                        <?php 
                        $balanceDebit=0;
                        foreach($data['StuTransaction'] as $transaction){
                          if($transaction['entry_type'] == 'debit'  && $transaction['TransactionType']['id'] == 1 && @$transaction['FeeType']['is_soa_reflected'] == false){
                            $balanceDebit=$balanceDebit + $transaction['amount']; 
                          }//end if debit
                        }//END FOREACH
                        echo '<b>'.CakeNumber::currency($balanceDebit, '', ['zero'=>'','negative'=>'-']).'</b>';
                      ?>
                  </td>
                  <td>
                        <?php 
                        $balanceCredit=0;
                        foreach($data['StuTransaction'] as $transaction){
                          if($transaction['entry_type'] == 'credit' && $transaction['TransactionType']['id'] == 2 && @$transaction['StuKnock'][0]['Bill']['FeeType']['is_soa_reflected'] == false){                                          
                                $balanceCredit=$balanceCredit + $transaction['amount'];
                          }//end if debit
                        }//END FOREACH
                        echo '<b>'.CakeNumber::currency($balanceCredit, '', ['zero'=>'','negative'=>'-']).'</b>';
                      ?>
                  </td>
                  <td>
                    <span <?=($balancing < 0)?"style='color:red'":""?>>
                          <?php echo "<strong>".CakeNumber::currency($balancing, '',['zero'=>'','negative'=>'-'])."</strong>" ?>
                    </span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <?php endif; ?>
                <tr bgcolor="#9bc2e6">
                  <hr style="margin-right:0">
                  <td colspan=4 align="right"><b>Grand Total</b></td>
                    <td>
                        <?php 
                        $balanceDebit=0;
                        foreach($data['StuTransaction'] as $transaction){
                          if($transaction['entry_type'] == 'debit'  && $transaction['TransactionType']['id'] == 1){
                            $balanceDebit=$balanceDebit + $transaction['amount']; 
                          }//end if debit
                        }//END FOREACH
                        echo '<b>'.CakeNumber::currency($balanceDebit, '', ['zero'=>'','negative'=>'-']).'</b>';
                      ?>
                  </td>
                  <td>
                        <?php 
                        $balanceCredit=0;
                        foreach($data['StuTransaction'] as $transaction){
                          if($transaction['entry_type'] == 'credit' && $transaction['TransactionType']['id'] == 2){                                          
                                $balanceCredit=$balanceCredit + $transaction['amount'];
                          }//end if debit
                        }//END FOREACH
                        echo '<b>'.CakeNumber::currency($balanceCredit, '', ['zero'=>'','negative'=>'-']).'</b>';
                      ?>
                  </td>
                  <td>
                  <?php $grand_total = $balance_programfee + $balancing ?>
                    <span <?=($grand_total < 0)?"style='color:red'":""?>>
                          <?php echo "<strong>".CakeNumber::currency($grand_total, '',['zero'=>'','negative'=>'-'])."</strong>" ?>
                    </span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
              
      </table>
</div>