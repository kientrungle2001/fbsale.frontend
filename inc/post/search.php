<div class="border-bottom h45">
	<form class="form-inline w100p"> 
	<div style="margin-top: 1px;" class="input-group w100p"> 
		<input name="name" class="form-control form-control-sm" type="search" placeholder="Tìm kiếm..." aria-label="Search" ng-model="filter.keyword">
		<div class="input-group-append"> 
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button> 
		</div> 
	</div> 
	</form>
</div>
<p class="text-center" ng-show="keyword">Từ khóa: {{filter.keyword}}</p>