/*
 Highcharts JS v6.0.4 (2017-12-15)

 (c) 2009-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(g){"object"===typeof module&&module.exports?module.exports=g:g(Highcharts)})(function(g){(function(a){var f=a.Axis,w=a.Chart,n=a.color,m,k=a.each,t=a.extend,v=a.isNumber,p=a.Legend,h=a.LegendSymbolMixin,d=a.noop,r=a.merge,g=a.pick,u=a.wrap;a.ColorAxis||(m=a.ColorAxis=function(){this.init.apply(this,arguments)},t(m.prototype,f.prototype),t(m.prototype,{defaultColorAxisOptions:{lineWidth:0,minPadding:0,maxPadding:0,gridLineWidth:1,tickPixelInterval:72,startOnTick:!0,endOnTick:!0,offset:0,
    marker:{animation:{duration:50},width:.01,color:"#999999"},labels:{overflow:"justify",rotation:0},minColor:"#e6ebf5",maxColor:"#003399",tickLength:5,showInLegend:!0},keepProps:["legendGroup","legendItemHeight","legendItemWidth","legendItem","legendSymbol"].concat(f.prototype.keepProps),init:function(b,c){var e="vertical"!==b.options.legend.layout,l;this.coll="colorAxis";l=r(this.defaultColorAxisOptions,{side:e?2:1,reversed:!e},c,{opposite:!e,showEmpty:!1,title:null,visible:b.options.legend.enabled});
    f.prototype.init.call(this,b,l);c.dataClasses&&this.initDataClasses(c);this.initStops();this.horiz=e;this.zoomEnabled=!1;this.defaultLegendLength=200},initDataClasses:function(b){var c=this.chart,e,l=0,q=c.options.chart.colorCount,a=this.options,h=b.dataClasses.length;this.dataClasses=e=[];this.legendItems=[];k(b.dataClasses,function(b,d){b=r(b);e.push(b);b.color||("category"===a.dataClassColor?(d=c.options.colors,q=d.length,b.color=d[l],b.colorIndex=l,l++,l===q&&(l=0)):b.color=n(a.minColor).tweenTo(n(a.maxColor),
    2>h?.5:d/(h-1)))})},setTickPositions:function(){if(!this.dataClasses)return f.prototype.setTickPositions.call(this)},initStops:function(){this.stops=this.options.stops||[[0,this.options.minColor],[1,this.options.maxColor]];k(this.stops,function(b){b.color=n(b[1])})},setOptions:function(b){f.prototype.setOptions.call(this,b);this.options.crosshair=this.options.marker},setAxisSize:function(){var b=this.legendSymbol,c=this.chart,e=c.options.legend||{},l,q;b?(this.left=e=b.attr("x"),this.top=l=b.attr("y"),
    this.width=q=b.attr("width"),this.height=b=b.attr("height"),this.right=c.chartWidth-e-q,this.bottom=c.chartHeight-l-b,this.len=this.horiz?q:b,this.pos=this.horiz?e:l):this.len=(this.horiz?e.symbolWidth:e.symbolHeight)||this.defaultLegendLength},normalizedValue:function(b){this.isLog&&(b=this.val2lin(b));return 1-(this.max-b)/(this.max-this.min||1)},toColor:function(b,c){var e=this.stops,l,q,a=this.dataClasses,h,d;if(a)for(d=a.length;d--;){if(h=a[d],l=h.from,e=h.to,(void 0===l||b>=l)&&(void 0===e||
        b<=e)){q=h.color;c&&(c.dataClass=d,c.colorIndex=h.colorIndex);break}}else{b=this.normalizedValue(b);for(d=e.length;d--&&!(b>e[d][0]););l=e[d]||e[d+1];e=e[d+1]||l;b=1-(e[0]-b)/(e[0]-l[0]||1);q=l.color.tweenTo(e.color,b)}return q},getOffset:function(){var b=this.legendGroup,c=this.chart.axisOffset[this.side];b&&(this.axisParent=b,f.prototype.getOffset.call(this),this.added||(this.added=!0,this.labelLeft=0,this.labelRight=this.width),this.chart.axisOffset[this.side]=c)},setLegendColor:function(){var b,
    c=this.reversed;b=c?1:0;c=c?0:1;b=this.horiz?[b,0,c,0]:[0,c,0,b];this.legendColor={linearGradient:{x1:b[0],y1:b[1],x2:b[2],y2:b[3]},stops:this.stops}},drawLegendSymbol:function(b,c){var e=b.padding,a=b.options,d=this.horiz,h=g(a.symbolWidth,d?this.defaultLegendLength:12),k=g(a.symbolHeight,d?12:this.defaultLegendLength),f=g(a.labelPadding,d?16:30),a=g(a.itemDistance,10);this.setLegendColor();c.legendSymbol=this.chart.renderer.rect(0,b.baseline-11,h,k).attr({zIndex:1}).add(c.legendGroup);this.legendItemWidth=
    h+e+(d?a:f);this.legendItemHeight=k+e+(d?f:0)},setState:function(b){k(this.series,function(c){c.setState(b)})},visible:!0,setVisible:d,getSeriesExtremes:function(){var b=this.series,c=b.length;this.dataMin=Infinity;for(this.dataMax=-Infinity;c--;)void 0!==b[c].valueMin&&(this.dataMin=Math.min(this.dataMin,b[c].valueMin),this.dataMax=Math.max(this.dataMax,b[c].valueMax))},drawCrosshair:function(b,c){var e=c&&c.plotX,a=c&&c.plotY,d,h=this.pos,k=this.len;c&&(d=this.toPixels(c[c.series.colorKey]),d<h?
    d=h-2:d>h+k&&(d=h+k+2),c.plotX=d,c.plotY=this.len-d,f.prototype.drawCrosshair.call(this,b,c),c.plotX=e,c.plotY=a,this.cross&&!this.cross.addedToColorAxis&&this.legendGroup&&(this.cross.addClass("highcharts-coloraxis-marker").add(this.legendGroup),this.cross.addedToColorAxis=!0,this.cross.attr({fill:this.crosshair.color})))},getPlotLinePath:function(b,c,e,d,a){return v(a)?this.horiz?["M",a-4,this.top-6,"L",a+4,this.top-6,a,this.top,"Z"]:["M",this.left,a,"L",this.left-6,a+6,this.left-6,a-6,"Z"]:f.prototype.getPlotLinePath.call(this,
    b,c,e,d)},update:function(b,c){var a=this.chart,d=a.legend;k(this.series,function(b){b.isDirtyData=!0});b.dataClasses&&d.allItems&&(k(d.allItems,function(b){b.isDataClass&&b.legendGroup&&b.legendGroup.destroy()}),a.isDirtyLegend=!0);a.options[this.coll]=r(this.userOptions,b);f.prototype.update.call(this,b,c);this.legendItem&&(this.setLegendColor(),d.colorizeItem(this,!0))},remove:function(){this.legendItem&&this.chart.legend.destroyItem(this);f.prototype.remove.call(this)},getDataClassLegendSymbols:function(){var b=
    this,c=this.chart,e=this.legendItems,l=c.options.legend,f=l.valueDecimals,p=l.valueSuffix||"",g;e.length||k(this.dataClasses,function(l,q){var r=!0,n=l.from,m=l.to;g="";void 0===n?g="\x3c ":void 0===m&&(g="\x3e ");void 0!==n&&(g+=a.numberFormat(n,f)+p);void 0!==n&&void 0!==m&&(g+=" - ");void 0!==m&&(g+=a.numberFormat(m,f)+p);e.push(t({chart:c,name:g,options:{},drawLegendSymbol:h.drawRectangle,visible:!0,setState:d,isDataClass:!0,setVisible:function(){r=this.visible=!r;k(b.series,function(b){k(b.points,
    function(b){b.dataClass===q&&b.setVisible(r)})});c.legend.colorizeItem(this,r)}},l))});return e},name:""}),k(["fill","stroke"],function(b){a.Fx.prototype[b+"Setter"]=function(){this.elem.attr(b,n(this.start).tweenTo(n(this.end),this.pos),null,!0)}}),u(w.prototype,"getAxes",function(b){var c=this.options.colorAxis;b.call(this);this.colorAxis=[];c&&new m(this,c)}),u(p.prototype,"getAllItems",function(b){var c=[],a=this.chart.colorAxis[0];a&&a.options&&(a.options.showInLegend&&(a.options.dataClasses?
    c=c.concat(a.getDataClassLegendSymbols()):c.push(a)),k(a.series,function(b){b.options.showInLegend=!1}));return c.concat(b.call(this))}),u(p.prototype,"colorizeItem",function(b,c,a){b.call(this,c,a);a&&c.legendColor&&c.legendSymbol.attr({fill:c.legendColor})}),u(p.prototype,"update",function(b){b.apply(this,[].slice.call(arguments,1));this.chart.colorAxis[0]&&this.chart.colorAxis[0].update({},arguments[2])}))})(g);(function(a){var f=a.defined,g=a.each,n=a.noop,m=a.seriesTypes;a.colorPointMixin={isValid:function(){return null!==
    this.value&&Infinity!==this.value&&-Infinity!==this.value},setVisible:function(a){var k=this,f=a?"show":"hide";g(["graphic","dataLabel"],function(a){if(k[a])k[a][f]()})},setState:function(k){a.Point.prototype.setState.call(this,k);this.graphic&&this.graphic.attr({zIndex:"hover"===k?1:0})}};a.colorSeriesMixin={pointArrayMap:["value"],axisTypes:["xAxis","yAxis","colorAxis"],optionalAxis:"colorAxis",trackerGroups:["group","markerGroup","dataLabelsGroup"],getSymbol:n,parallelArrays:["x","y","value"],
    colorKey:"value",pointAttribs:m.column.prototype.pointAttribs,translateColors:function(){var a=this,f=this.options.nullColor,n=this.colorAxis,m=this.colorKey;g(this.data,function(h){var d=h[m];if(d=h.options.color||(h.isNull?f:n&&void 0!==d?n.toColor(d,h):h.color||a.color))h.color=d})},colorAttribs:function(a){var k={};f(a.color)&&(k[this.colorProp||"fill"]=a.color);return k}}})(g);(function(a){var f=a.colorPointMixin,g=a.each,n=a.merge,m=a.noop,k=a.pick,t=a.Series,v=a.seriesType,p=a.seriesTypes;
    v("heatmap","scatter",{animation:!1,borderWidth:0,nullColor:"#f7f7f7",dataLabels:{formatter:function(){return this.point.value},inside:!0,verticalAlign:"middle",crop:!1,overflow:!1,padding:0},marker:null,pointRange:null,tooltip:{pointFormat:"{point.x}, {point.y}: {point.value}\x3cbr/\x3e"},states:{normal:{animation:!0},hover:{halo:!1,brightness:.2}}},n(a.colorSeriesMixin,{pointArrayMap:["y","value"],hasPointSpecificOptions:!0,getExtremesFromAll:!0,directTouch:!0,init:function(){var a;p.scatter.prototype.init.apply(this,
        arguments);a=this.options;a.pointRange=k(a.pointRange,a.colsize||1);this.yAxis.axisPointRange=a.rowsize||1},translate:function(){var a=this.options,d=this.xAxis,f=this.yAxis,n=a.pointPadding||0,m=function(b,a,d){return Math.min(Math.max(a,b),d)};this.generatePoints();g(this.points,function(b){var c=(a.colsize||1)/2,e=(a.rowsize||1)/2,h=m(Math.round(d.len-d.translate(b.x-c,0,1,0,1)),-d.len,2*d.len),c=m(Math.round(d.len-d.translate(b.x+c,0,1,0,1)),-d.len,2*d.len),g=m(Math.round(f.translate(b.y-e,0,
        1,0,1)),-f.len,2*f.len),e=m(Math.round(f.translate(b.y+e,0,1,0,1)),-f.len,2*f.len),p=k(b.pointPadding,n);b.plotX=b.clientX=(h+c)/2;b.plotY=(g+e)/2;b.shapeType="rect";b.shapeArgs={x:Math.min(h,c)+p,y:Math.min(g,e)+p,width:Math.abs(c-h)-2*p,height:Math.abs(e-g)-2*p}});this.translateColors()},drawPoints:function(){p.column.prototype.drawPoints.call(this);g(this.points,function(a){a.graphic.attr(this.colorAttribs(a))},this)},animate:m,getBox:m,drawLegendSymbol:a.LegendSymbolMixin.drawRectangle,alignDataLabel:p.column.prototype.alignDataLabel,
        getExtremes:function(){t.prototype.getExtremes.call(this,this.valueData);this.valueMin=this.dataMin;this.valueMax=this.dataMax;t.prototype.getExtremes.call(this)}}),a.extend({haloPath:function(a){if(!a)return[];var d=this.shapeArgs;return["M",d.x-a,d.y-a,"L",d.x-a,d.y+d.height+a,d.x+d.width+a,d.y+d.height+a,d.x+d.width+a,d.y-a,"Z"]}},f))})(g)});