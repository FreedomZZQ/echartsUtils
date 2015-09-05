function data_formatting(item){
	var data_form=[];
	for( var i=0;i<item.length;i++)
		data_form.push(item[i]);
	return data_form;
}
function data_jsoning(item1,item2){
	var data_json=[];
	for(var i=0;i<item1.length;i++){
		data_json.push({value:item2[i],name:item1[i]});
	}
	return data_json;
}
function echarts_line(line_name,x_positions,y_positions){
	require.config({
		paths:{
			echarts:'../echarts-2.2.2/build/dist'
		}
	});
	require(
		[
		'echarts',
		'echarts/chart/bar',
		'echarts/chart/line'
		],
		function(ec){
			var myChart=ec.init(document.getElementById('main'));
			myChart.showLoading({
				text:'正在努力读取数据中',
			});
			myChart.hideLoading();
			var option={
				legend:{
					padding:5,
					itemGap:10,
					data:[]
				},
				tooltip:{
					trigger:'item',
				},
				xAxis:[
				{
					type:'category',
					data:data_formatting(x_positions)
					//data:['jan','fab','mar','apr','may','jun','jul','aug','oct','nov','dec']
				}],
				yAxis:[
				{
					type:'value',
					boundaryGap:[0.1,0.1],
					splitNumber:4
				}],
				calculable : true,
				series:[],
			};
			myChart.setOption(option);
			for(var i=0;i<line_name.length;i++){
				option.legend.data.push(line_name[i]);
				option.series.push({
					name:line_name[i],
					type:'line',
					data:data_formatting(y_positions[i])
					//data:[112,23,45,56,233,343,454,89,343,123,45,11]
				});
			}
			myChart.setOption(option);
		}
	);
}


function echarts_pie(pie_title,pie_name,pie_value){
	require.config({
				paths:{
					echarts:'../echarts-2.2.2/build/dist'
				}
			});
	require(
		[
		'echarts',
		'echarts/chart/pie',
		'echarts/chart/line'
		],
		function(ec){
			var myChart=ec.init(document.getElementById('pie_main'));
			var option={
				tooltip:{
					trigger:'item',
					formatter:"{a}</br>{b}:{c} {d}%)"
				},
				legend:{
					orient: 'vertical',
					x:'right',
					data: data_formatting(pie_name)
				},
				series:[
				{
					name:'访问来源',
					type:'pie',
					radius:['50%','70%'],
					itemStyle:{
						normal:{
							label:{
								show:false
							},
							labelLine:{
								show:false
							}
						},
						emphasis:{
							label:{
								show:true,
								position:'center',
								textStyle:{
									fontSize:'30',
									fontWeight:'bold'
								}
							}
						}
					},
					//data:[
					//{value:335,name:'直接访问'},
					//{value:310,name:'邮件营销'},
					//{value:234,name:'联盟广告'},
					//{value:135,name:'视频广告'},
					//{value:1548,name:'搜索引擎'}
					//]
					data:data_jsoning(pie_name,pie_value)
				}]
			};
			myChart.setOption(option);
		}
	);
}