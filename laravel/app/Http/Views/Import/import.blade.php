<style type="text/css">
	div#content {
		text-align: center;
		margin: 50px;
	}
	div#status {
		text-align: left;
		padding: 5px;
		width: 500px;
		border: solid 1px #009926;
		color: #009926;
		margin: auto;
	}
	div#status .data {
		font-weight: bold;
		color: #000000;
	}
</style>
<div id="content">
	<div id="status">
		<p>Время старта: <span class="data"><?= $time_start;?></span></p>
		<p>Текст статуса: <span class="data"><?= $status;?></span></p>
		<p>Вставлено новых записей: <span class="data"><?= $insert_count;?></span></p>
		<p>Обновлено записей: <span class="data"><?= $update_count;?></span></p>
		<p>Обработано CSV строк: <span class="data"><?= $csv_done;?></span></p>
		<p>Всего CSV строк в файле: <span class="data"><?= $csv_string_count;?></span></p>
		<p>Оценка времени до конца импорта: <span class="data"><?= $time_complete;?></span></p>
	</div>
	<br>
	<button id="stop" onclick="stop_process(this)">Остановить</button>
</div>