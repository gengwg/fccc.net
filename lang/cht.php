<?php

##############
### header ###
##############

$str_nav = "
<!-- BEGIN plain text navigation -->
<p id=\"navPlain\"><font color=\"red\">Plain Text Navigation</font><br /><br />
<a href=\"?mod=main\">view main</a>&nbsp;&nbsp;|
<a href=\"?mod=church\">church</a>&nbsp;&nbsp;|
<a href=\"?mod=hymns\">hymns</a>&nbsp;&nbsp;|
<a href=\"?mod=pictures\">pictures</a>&nbsp;&nbsp;|
<a href=\"?mod=daycare\">daycare</a>&nbsp;&nbsp;|
<a href=\"?mod=contact\">contact</a>

<table id=\"navPlain\"><tr>
	<td>
		<b>church</b> submenu<br />
		<a href=\"?mod=church&view=programme\">programme 週報</a><br />
		<a href=\"?mod=church&view=sundayschool\">sunday school 主日學</a><br />
		<a href=\"?mod=church&view=bible\">bible 聖經</a><br />
		<a href=\"?mod=church&view=donation\">donation 奉獻</a><br />
	</td>
	<td>
		<b>pictures</b> submenu<br />
		<a href=\"?mod=pictures&view=church\">教會照片</a><br />
		<a href=\"?mod=pictures&view=daycare\">安親班照片</a><br />
	</td>
	<td>
		<b>daycare</b> submenu<br />
		<a href=\"?mod=daycare&view=flyer\">flyer 傳單</a><br />
		<a href=\"?mod=daycare&view=craft\">craft 作業</a><br />
		<a href=\"?mod=daycare&view=pictures\">pictures 照片</a><br />
		<a href=\"?mod=daycare&view=health\">health 保健</a><br />
		<a href=\"?mod=daycare&view=dinnerbox\">dinner box 盒飯</a><br />
	</td>
</tr></table>
</p>
<!-- END plain text navigation -->";
$str_church_submenu = "
	<center><a href=\"?mod=church&view=programme\">programme 週報</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=church&view=sundayschool\">sunday school 主日學</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=church&view=bible\">bible 聖經</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=church&view=donation\">donation 奉獻</a>\n</center>";
$str_pictures_submenu = "
	<center><a href=\"?mod=pictures&view=church\">church albums 教會照片</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=pictures&view=babysitting\">daycare albums 安親班照片</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=pictures&view=others\">others albums 其他照片</a>\n</center><br />";
$str_daycare_submenu = "
	<center><a href=\"?mod=daycare&view=flyer\">flyer 傳單</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=daycare&view=craft\">craft 作業</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=pictures&view=babysitting\">pictures 照片</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=daycare&view=health\">health 保健</a>&nbsp;&nbsp;|&nbsp;&nbsp;\n
	<a href=\"?mod=daycare&view=dinnerbox\">dinner box 盒飯</a>\n</center>";

#################################
### mod=daycare & view=health ###
#################################

$str_art_fru = "
	<br />	　　蘋果汁： 調理腸胃，促進腎機能， 預防高血壓
	<br />　　芒果汁： 幫助消化，防止暈船嘔吐喉嚨
	<br />　　鳳梨汁： 消腫怯溼，幫助消化 ，舒緩喉痛
	<br />　　木瓜汁： 消滯潤肺，幫助消化蛋白質
	<br />　　西瓜汁： 消暑利尿，降血壓
	<br />　　芹菜汁： 補充體力，舒緩焦慮、壓力 
	<br />　　香蕉汁： 提高精力，強健肌肉，滋潤肺腸，血脈暢通
	<br />　　葡萄汁： 調節心跳，補血安神，加強腎、肝功能 ，幫助消化
	<br />　　檸檬汁： 含豐富維他命C，止咳化痰，有助 排除體內毒素
	<br />　　柳橙汁： 滋潤健胃，強化血管，可預防心臟病、中風、傷風、感冒和淤傷 
	<br />　　草莓汁： 利尿止瀉，強健神經， 補充血液 梨子汁： 能維持心臟，血管正常運作，去除體內毒素 
	<br />　　椰子汁： 預防心臟病， 關節炎和癌症，強健肌膚，滋潤止咳 葡萄柚汁： 降低膽固醇，預防感冒及牙齦出血 
	<br />　　奇異果汁： 含豐富維他命C，清熱生津，止吐瀉 
	<br />　　紅蘿蔔汁： 刺激膽汁分泌，中和膽固醇 ，增加腸壁彈性 ，安撫神經 
	<br />　　哈密瓜汁： 消暑解燥，生津止渴 蓮霧：解熱，利尿，寧靜神經作用（ 加鹽可以幫助消化） 
	<br />　　鳳梨：對人體組織有強壯作用，可治消化不良，食慾不振， 果肉磨擦皮膚可治出汗過多 
	<br />　　棗子：可治便秘，利尿，益胃生津（ 空腹不可過食，須細嚼慢吞） 
	<br />　　荔枝：補血健肺，促進血液循環， 心臟衰竭者可多食（已燥熱者不可多食）
	<br />　　龍眼：乾的對 健忘， 心跳不正常，神經衰弱之失眠，有療效且滋補（ 隔水煮，不可多食） 
	<br />　　蘋果：治便秘（少）， 治下痢（多），滋潤皮膚，清潔牙齒 
	<br />　　梨子：清熱解毒， 鎮咳化痰（用梨削頂部處成１ ４蓋狀，去核心，塞入川貝粉一錢， 加少許冰糖，蓋上蓋子，隔水煮，梨肉汁同食） 
	<br />　　桃子：清津味甘，肥良果（ 多食易消化不良，應洗淨） 
	<br />　　柿子：瀉血，便秘，可蒸柿餅食用，一天兩枚，可療肺熱，多痰，燥性，氣管炎，具潤肺 止咳化痰之效（ 不可冰過） 
	<br />　　檸檬：可增強消化， 出汗過多，食慾不振，體力倦怠， 減肥解酒可飲汁，切片敷貼臉部， 可排除脂積 （果汁需含皮 ） 
	<br />　　柚子：清燥熱， 通便， 消口臭， 腸中惡氣，解酒（性寒，易腹疼，貧血，多痰不宜多食） 
	<br />　　橘子：性寒，可解熱， 化痰， 防便秘，生津止渴， 擦皮膚有止痛消炎之效，亦有美容之效 
	<br />　　桶柑：多吃不會寒滯，可解熱， 利尿， 袪痰，防便秘，生津止渴 
	<br />　　葡萄柚：可生津止渴，消暑，消除疲勞， 降血壓，助消化， 美容， 潤膚減肥
	<br />　　桑椹：可調節消化，治胃病，便秘， 老枝煎水飲用可通血氣止痛， 預防風寒， 葉煎水加冰糖或黑糖當茶喝 ，可清肺熱 
	<br />　　芭樂：營養價值為果品之冠， 種子鐵的含量為熱帶水果之最， 果皮可治糖尿病 
	<br />　　芒果：可 治療暈車， 嘔吐， 熟果肉可敷火傷，開水燙傷，止痛消炎，易過敏， 有外傷不宜 多食 
	<br />　　木瓜：煮肉時加幾片木瓜可以加速爛熟， 敷臉可除去黑斑， 雀斑美化肌膚，胃腸患者烹飪時加未成熟木瓜少許，可助消化， 治潰瘍， 外傷用生木瓜，連皮磨成漿狀敷上，易癒合， 是最佳的減肥水果
";

$str_art_flu = "
	<br />
	　　感冒是人與人之間的傳染，當人與人接觸頻繁時，發生感冒的機會大增。大人因為已經具有對抗多種感冒病毒的免疫力，所以雖然在一般的工作場所有許多機會接觸到感冒病毒，但是不太容易發病。小孩則因為免疫系統還沒有接受過各種感冒病毒的試煉，所以感冒的機會就比較大。尤其是上托兒所、幼稚園的小孩，感冒病毒就常常在兒童的玩樂嬉戲之中傳布擴散。<br /><br />
	　　感冒大多是經由飛沫傳染，能夠避免吸入這些病毒，就可以避免感染。有一些研究顯示，感冒病毒的傳播不一定是藉由飛沫傳染，有時候它們會經由人與人之間的接觸而傳染。如果我們能夠對一般的用具都勤加清洗，並且避免觸摸眼鼻的動作，就可以減少因為手上沾到了病毒，而得到感冒病毒感染的機會。洗手可以將手上的病毒洗掉，也是預防感冒的有效作法，儘量避免去人多的場所也是有效的作法。<br /><br />
	<b><u>疫苗可以有效預防所有感冒？</u></b><br />
	　　多種不同的病毒都會引起感冒，所以沒有單一的作法可以預防所有的感冒。流感是一種特殊的病毒，引起的疾病又特別嚴重，所以人們特別針對這種病毒發展出有效的疫苗與抗病毒藥物。如果是高危險的人，預防的上策是接種流感疫苗。如果已經發生大流行，而有些人還沒有接種過疫苗，則可以在流行期間固定服用抗病毒藥物 
	(amantadine或rimantadine)。會引起其他感冒的病毒種類太多，用疫苗來預防所有的感冒並不可行。<br /><br />
	<b><u>感冒需不需要吃藥？</u></b><br />
	　　普通的感冒都是病毒所引起的，目前很多感冒病毒都還沒有公認有效的抗病毒藥物。目前我們雖然還沒有公認有效的病毒藥物，卻有著一些可以減輕症狀的藥物。沒有特殊併發症的感冒，不吃藥也會好。如果有了併發症，那就另當別論。如果是有中耳炎之類的併發症，就一定要用抗生素治療。<br /><br />
	　　很多人一碰到感冒就自行到藥房購買成藥治療，這是不值得鼓勵的做法。有流鼻水、咳嗽等類似感冒症狀的時候，並不一定是真正病毒感染引起的感冒，那可能是肺炎、過敏性鼻炎、氣喘等感冒成藥無法治療的疾病。感冒也有可能引起細菌性感染的併發症，例如中耳炎、鼻竇炎、肺炎等，忽略了這些併發症的危險性，可能延誤了治療的時機。<br /><br />
	<b><u>什麼時候應該使用消炎藥？</u></b><br />
	　　有人認為感冒應該吃消炎藥才會比較快好，所以經常要求醫師開消炎藥，這是錯誤的觀念。我們口語中所說的消炎藥，其實就是學術上的抗生素。抗生素的作用在於消滅細菌，對於病毒感染並沒有幫助。一般的感冒不需要用抗生素，當有細菌併發症的時候才需要使用。<br /><br />
	<b><u>打針真的比較快好？</u></b><br />
	　　很多人認為感冒要打針才會好的比較快，高燒不退就必須打點滴才會好，這些都是錯誤的觀念。無論是症狀治療的藥物或是抗生素，打入人體數小時以後，就會被代謝掉，其作用的時效與口服藥物並無重大的差異，所以對一般感冒的療效並無不同。<br />
";


?>