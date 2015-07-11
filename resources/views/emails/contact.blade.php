<p>
	{{ $fullName }} <i>({{ $email }})</i> say:
</p>

<p>
	<img src="<?php echo $message->embed($file); ?>">
</p>

<p>
	{{ $body }}
</p>