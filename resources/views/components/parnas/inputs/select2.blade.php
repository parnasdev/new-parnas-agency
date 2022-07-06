@props(['ajax' => false , 'api' => '' , 'data' => []])
{{--@dd($data)--}}
@if($ajax)
    <select
        {{ $attributes }}
            x-data="{control : null}"
        x-init="
        control = new TomSelect($el,{
		    valueField: 'id',
		    labelField: 'text',
		    searchField: ['text'],

		    load: function(query, callback) {
			    var self = this;
			    if( self.loading > 1 ){
				    callback();
				    return;
			    }
			    var url = '{{ $api }}?q='+query;
			    fetch(url)
				    .then(response => response.json())
				    .then(json => {
					    callback(json.items);
				    }).catch(()=>{
					    callback();
				    });
		    }
        });

         @foreach($data as $item)
            control.addOption({
		        id: {{$item['id']}},
		        text: '{{$item['text']}}'
	        });
         @endforeach

            control.setValue({{ collect($data)->pluck('id')->toJson() }});
">
        {{ $slot }}
    </select>
@else
<select
    {{ $attributes }}
        x-data=""
    x-init="
    new TomSelect($el,{
               create: false
    });
">
    {{ $slot }}
</select>
@endif
