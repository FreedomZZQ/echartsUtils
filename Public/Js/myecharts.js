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
	var myChart=echarts.init(document.getElementById('line_main'));
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
	// myChart.setOption(option);
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



function echarts_pie(pie_title,pie_name,pie_value){
	var myChart=echarts.init(document.getElementById('pie_main'));
	myChart.setOption({
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
		data:data_jsoning(pie_name,pie_value)
		}]
	});
}