<?php

// baidu
if($baidu) $this->registerJs('var _hmt=_hmt||[];(function(){var hm=document.createElement("script");hm.src="//hm.baidu.com/hm.js?' . $baidu . '";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm,s);})();', 1);

// cnzz
if($cnzz) $this->registerJs('var cnzz_protocol=(("https:"==document.location.protocol)?" https://" :" http://");document.write(unescape("%3Cdiv style=\'display:none;\'%3E%3Cspan id=\'cnzz_stat_icon_' . $cnzz . '\'%3E%3C/span%3E%3Cscript src=\'"+cnzz_protocol+"s4.cnzz.com/z_stat.php%3Fid%3D' . $cnzz . '%26show%3Dpic\' type=\'text/javascript\'%3E%3C/script%3E%3C/div%3E"));', 3);

// piwik
if($piwik) $this->registerJs('var _paq=_paq||[];_paq.push(["trackPageView"]);_paq.push(["enableLinkTracking"]);(function(){var a="//' . $piwik['url'] . '/";_paq.push(["setTrackerUrl",a+"piwik.php"]);_paq.push(["setSiteId",' . $piwik['id'] . ']);var e=document,c=e.createElement("script"),b=e.getElementsByTagName("script")[0];c.type="text/javascript";c.async=true;c.defer=true;c.src=a+"piwik.js";b.parentNode.insertBefore(c,b)})();', 3);
