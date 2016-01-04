<?php
defined('_JEXEC') or die('Restricted access'); ?>

<div class="note">
	您選擇了[智付寶線上金流]付款，確認無誤後，接下來將選擇付款方式，完成您的訂單！<p>
</div>
<form action="<?php echo JRoute::_( "index.php?option=com_j2store&view=checkout" ); ?>" method="post" name="adminForm" enctype="multipart/form-data">   
    <input type='hidden' name='offline_payment_method' value='<?php echo @$vars->offline_payment_method; ?>'>
    <input type="submit" id="confirmbtn" class="button" value="<?php echo '下一步 -> 選擇付款方式'; ?>" />
    <input type='hidden' name='order_id' value='<?php echo @$vars->MerchantOrderNo; ?>'>
    <input type='hidden' name='orderpayment_id' value='<?php echo @$vars->orderpayment_id; ?>'>
    <input type='hidden' name='orderpayment_type' value='<?php echo @$vars->orderpayment_type; ?>'>
	<input type='hidden' name='nw_username' value='<?php echo @$vars->nw_username; ?>'>
	<input type='hidden' name='nw_useremail' value='<?php echo @$vars->nw_useremail; ?>'>
	<input type='hidden' name='nw_userphone' value='<?php echo @$vars->nw_userphone; ?>'>
    <input type='hidden' name='task' value='confirmPayment'>
</form>
		