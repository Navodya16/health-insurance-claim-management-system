<?php
require('../stripe-php-master/init.php');

//$publishableKey = "pk_test_51Liu8iSJCpNBAMNxDUkUQ4wAqLOkHZ7RzaRrzwK3Op1844gYeLT6XgnbDrYaD8h0yjvb6HwLPqpgPVFP07B4Ppr400uN1fV9Bc";
$publishableKey = "pk_test_51Lotp2DAGEQxD6PIDqVAYjS91VVpJuXWPOOnUN5LaCfas6Tah3pDAvvvOPYc75Snoc14brDLhCoSsVmYlvt9pcJO00ZML0fmsH";

//$secretKey = "sk_test_51Liu8iSJCpNBAMNx4XHYa0cjA7ZBB5SO0muNfznUCv5zmTXFhU6QOlI7jQWih8SKB1KdKJH0amx6hjlMAKnCAASc00Pb0HnWGM";
$secretKey = "sk_test_51Lotp2DAGEQxD6PIrY3jpeMXD1sMStR3L3f6upJF68mq7pD04wGIvj0fJPG3cFD4dFW7P1P84o1LLTIyFpDwfxgy00cPVwL0FN";

\Stripe\Stripe::setApiKey($secretKey);

?>