<?php

$str1 = "The Content of this Website is owned by Foster City Chinese Church of California and is protected by copyright law, as a collective work and compilation, both in U.S.A. and abroad.";
$str2 = "The site is designed to provide knowledge for information purposes only. The information is taken from sources believed to be reliable, and the information is beleived to be accurate at the time it is posted to the Website. However, there is no way to ensure that the information is accurate at any particular moment in time. Foster City Chinese Church and its members, subsidiaries, affiliates, contractors, agents, volunteers, licensors, and/or third-party Content providers are in no way responsible or liable for any damages whether they be direct, indirect, consequential, incidental, special, punitive, exemplary or general damages, contribution or indemnity, of any kind whatsoever, however caused, arising out of the use or non-availability of this Website, or reliance on the Content contained herein. This limitation of liability shall hold even if Foster City Chinese Church, its members, subsidiaries, affiliates, contractors, agents, volunteers, licensors, and/or third party Content providers were warned of the possibility of damages referred in this disclaimer.";
$str3 = "Although care is taken to ensure the accuracy of the information on this Website, this information may contain typographical errors and/or technical inaccuracies. Changes may be periodically made to the information herein.";
$str4 = "\"Content\" includes, but is not limited to, all text, photographs, software, graphics, video and audio files and anything else contained in this Website.";
$str5 = "\"User\" includes, but is not limited to, any person who is able to access this Website by any means whatsoever, including, but not limited to, legal, illegal, authorized and unauthorized means.";

$strs = array($str1, $str2, $str3, $str4, $str5);

echo "<div align=\"center\">\n";
for($i=0; $i <= count($strs); $i++){
	echo "<p class=\"copyright\">$strs[$i]</p>\n";
}
echo "</div>\n";

?>