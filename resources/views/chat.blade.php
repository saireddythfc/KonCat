@extends('layouts.app')

@section('title','HOME')


<script type="text/javascript">
	
	
	function init(id) {
		if(window.socket == null){
		 	window.socket = io('http://localhost:3000');
		 	window.socket.connect();
		 	
		 	window.socket.on('msg2', function(msg) {
		 		var ul = document.getElementById("log");
			  var li = document.createElement("li");
			  li.appendChild(document.createTextNode('Not you:  '+msg));
			  ul.appendChild(li);
		 	});
		 	window.socket.emit('record', id);
		}

	}

	function emit(to_id, id, team_id) {
		ipBox = document.getElementById('message_ip').value;
		var ul = document.getElementById("log");
		  var li = document.createElement("li");
		  li.appendChild(document.createTextNode('You:  '+ipBox));
		  ul.appendChild(li);

		window.socket.emit('msg1', {'id': id, 'to_id': to_id, 'message': ipBox,
			'team_id': team_id});
	}

</script>

@section('content')
<div style="background-color: black">
<button style="background-color: #4CAF50;border: none; color: white;text-align: center;
  text-decoration: none;display: inline-block; font-size: 16px;border-radius: 20px; padding: 15px 32px; margin-left: 50px;margin-top: 50px;" onclick="init('{{$id}}');">Initialize Chat</button>


<p style="margin-top: 100px;font-family: monospace; font-size: 30px; color: white;">Chat With: <?php echo $chatWith[0]->name;?></p>
<p style="color: white;font-family: monospace; font-size: 30px;">Chat Regarding: <?php echo $chatRegarding[0]->event;?></p>
<ul id="log">
	@foreach($chats as $chat)

	@if($chat->from_id == $id)
	<!-- <img src="/images/chat_icon_left.jpg" alt="Avatar""> -->
	<p style="border: 2px solid #dedede;
  background-color: #f1f1f1;
  font-family: monospace; font-size: 20px;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;width: 80%;"><img src="/images/chat_icon_left.png" alt="YOU:" style="float: left;width:40px; height:40px">{{$chat->message}}</p>
  
	@endif
	@if($chat->from_id == $to_id)
	<p style="border: 2px solid #dedede;
	background-color: #ddd;
	font-family: monospace; font-size: 20px
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;border-color: #ccc;
  width: 80%;text-align: right;"><img src="/images/chat_icon_right.png" alt="YOU:" style="float: right;width:40px; height:40px">{{$chat->message}}  </p>
	@endif
	@endforeach
</ul>

<input style="width: 70%;border: 2px solid red; border-radius: 8px;padding: 10px" type="text" name="message" id="message_ip">





<button style="background-color: #008CBA;border: none; color: white;text-align: center;
  text-decoration: none;display: inline-block; font-size: 16px;border-radius: 20px; padding: 15px 32px;" onclick="emit('{{$to_id}}', '{{$id}}', '{{$team_id}}');">Send</button>


</div>




@endsection