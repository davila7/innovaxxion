@extends('admin_template')

@section('content')
<script src="{{ asset ("public/lib/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- chartjs -->
    <script src="{{ asset ("public/lib/admin-lte/plugins/chartjs/Chart.min.js") }}" type="text/javascript"></script>
<script src="https://almsaeedstudio.com/themes/AdminLTE/dist/js/pages/dashboard2.js" type="text/javascript"></script>
	<div class="row">
		<div class="col-md-3">
			<a href="{{ url('/perfiles') }}"><div class="info-box" >
			  <!-- Apply any bg-* class to to the icon to color it -->
			  <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
			  <div class="info-box-content">
			    <span class="info-box-text">Perfiles</span>
			    <span class="info-box-number">{!! $count_profiles !!}</span>
			  </div><!-- /.info-box-content -->
			</div><!-- /.info-box --></a>
		</div>
		<div class="col-md-3">
			<a href="{{ url('/travels') }}"><div class="info-box">
			  <!-- Apply any bg-* class to to the icon to color it -->
			  <span class="info-box-icon bg-red"><i class="fa fa-plane"></i></span>
			  <div class="info-box-content">
			    <span class="info-box-text">Viajes</span>
			    <span class="info-box-number">{!! $count_travels !!}</span>
			  </div><!-- /.info-box-content -->
			</div><!-- /.info-box --></a>
		</div>
		<div class="col-md-3">
			<a href="{{ url('/overall_cost') }}"><div class="info-box">
			  <!-- Apply any bg-* class to to the icon to color it -->
			  <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
			  <div class="info-box-content">
			    <span class="info-box-text">Gastos Generales</span>
			    <span class="info-box-number">{!! $count_overallcost !!}</span>
			  </div><!-- /.info-box-content -->
			</div><!-- /.info-box --></a>
		</div>
		<div class="col-md-3">
      <a href="{{ url('/etapas') }}"><div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-check-square-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Etapas</span>
          <span class="info-box-number">{!! $count_etapas !!}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box --></a>
		</div>
	</div>

	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Proyecto Prueba</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 180px;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Etapas</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Add Products to Cart</span>
                        <span class="progress-number"><b>160</b>/200</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 40%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Complete Purchase</span>
                        <span class="progress-number"><b>310</b>/400</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 30%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Visit Premium Page</span>
                        <span class="progress-number"><b>480</b>/800</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Send Inquiries</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
@endsection
