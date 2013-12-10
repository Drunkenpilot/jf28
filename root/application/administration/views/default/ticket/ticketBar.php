0x1b|bC<?=$order->order_num?>0x0a
0x1b|bC<?=date('d/m/Y H:i',strtotime($order->order_time))?>0x0a
0x1b|bCClinet: <?=$order->member->firstname?> <?=$order->member->lastname?>0x0a
0x1b|bCTelephone: <?=$order->member->tel?>0x0a
<?php if($order->order_type == 'take away'){?>
0x1b|bCEmporter à <?=$order->takeaway_time?>0x0a
0x1b|bCMagasin: <?=$order->shop->shop_name?>0x0a
<?php }else{?>
0x1b|bCLivraison à <?=$order->delivery_time?>0x0a0x0a
Nom: <?=$order->deliveryaddress->firstname?> <?=$order->deliveryaddress->lastname?>0x0a
Societe: <?=$order->deliveryaddress->company?>0x0a
Sonnette: <?=$order->deliveryaddress->ring?>0x0a
Adresse: <?=$order->deliveryaddress->address?> <?=$order->deliveryaddress->postal?> <?=$order->deliveryaddress->community?>0x0a
Contact: <?=$order->deliveryaddress->tele?>0x0a
<?php }?>
Message:<?php $some_special_chars = array("à", "é", "î", "ï", "ö", "ô", "û", "ü", "ç", "É","è", "ë", "Í", "Ó", "Ú", "ñ", "Ñ");
  $replacement_chars  = array("à", "é", "î", "ï", "ô", "ö", "û", "ü", "ç", "E","è", "ë", "I", "O", "U", "n", "N");
echo $replaced_string  = str_replace($some_special_chars, $replacement_chars, $order->message);?>0x0a0x0a
<?php foreach ($items as $item):?>
<?=$item->qty?>x <?=$item->product_name?> 0x1b|bC(<?=$item->product_num?>) 0x1b|rA<?=number_format($item->product_price,2,'.','')?> 0x800x0a
<?php endforeach;?>
0x1b|rA0x1b|bCTotal= <?=number_format($order->total*(1-$order->discount),2,'.','')?> 0x800x0a0x0a
0x1b|cA0x1b|bCMerci et à bientôt0x0a0x0a
0x1b|cA0x1b|bCAsia Express0x0a
0x1b|cA0x1b|bC<?=$order->shop->address?>0x0a
0x1b|cA0x1b|bC<?=$order->shop->shop_name?>0x0a0x0a0x0a