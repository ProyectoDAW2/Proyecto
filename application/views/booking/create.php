<div class="container">
	<h1>Date</h1>
	<div id='calendar'></div>
	<div class="modalContainer hidden" id="bookingModal">
		<div class="backdrop"></div>
		<div class="customModal">
			<h2 class="date" id="datePicked"></h2>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="8:20-9:15"> 8:20-9:15</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="9:15-10:10"> 9:15-10:10</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="10:10-11:00"> 10:10-11:00</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:00-11:35"> 11:00-11:35</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:35-12:30"> 11:35-12:30</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="12:30-13:25"> 12:30-13:25</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="13:25-14:20"> 13:25-14:20</label>
			</p>
			<p>
				<button class="submit">Confirm booking</button>
			</p>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/reserva/crear.js"></script>