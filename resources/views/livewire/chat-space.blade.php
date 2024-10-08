<div class="row">
   @livewire('ChatBox', ['friend' => $friend])
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Hello World! {{ $friend->name }}"
			aria-label="Recipient's username with two button addons">
		<button class="btn btn-light" type="button"><span class="text-primary"><i class="fas fa-location-arrow"></i></span></button>
		<label for="upload" class="btn btn-light text-info" tabindex="0">
			<i class="fas fa-paperclip"></i>
			<input type="file" id="upload" hidden />
		</label>
	</div>
</div>
 