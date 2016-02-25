<header>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				<a class="navbar-brand"><b>Quality Checklist</b></a>
			</div>

			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<li class="active"><a href="./">품질검수</a></li>
					<li><a href="#">검수이력</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<main>
	<div class="container">
		<form class="form-horizontal">
			<fieldset>
				<legend>Basic information</legend>
				<div class="form-group form-group-sm">
					<!-- 모델명 -->
					<label for="model" class="col-sm-1 control-label">모델명</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="model" name="model" placeholder="모델명" />
					</div>
					<!-- 자재 -->
					<label for="type" class="col-sm-1 control-label">자재</label>
					<div class="col-sm-3">
						<select name="type" id="type" class="form-control">
							<option>QSG</option>
							<option>UM</option>
						</select>
					</div>
					<!-- OS -->
					<label for="os" class="col-sm-1 control-label">OS</label>
					<div class="col-sm-3">
						<select name="os" id="os" class="form-control">
							<option>Jellybean</option>
							<option>Kitkat</option>
							<option>Lollipop</option>
							<option>Marshmallow</option>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<!-- 출향지 -->
					<label for="dest" class="col-sm-1 control-label">출향지</label>
					<div class="col-sm-3">
						<select name="dest" id="dest" class="form-control">
							<option>EU</option>
							<option>CIS</option>
						</select>
					</div>
					<!-- 언어 -->
					<label for="language" class="col-sm-1 control-label">언어</label>
					<div class="col-sm-3">
						<select name="language" id="language" class="form-control">
							<option>English</option>
						</select>
					</div>
					<!-- 검수자 -->
					<label for="person" class="col-sm-1 control-label">검수자</label>
					<div class="col-sm-3">
						<input type="text" name="person" id="person" class="form-control" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>세부 항목</legend>
			</fieldset>
		</form>
	</div>
</main>
