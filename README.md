# My Qiita Items

Enables to access your Qiita items via Twig.

## Installation

```
composer require ippey/my-qiita-items
```

## Usage
You can access your Qiita items ``` craft.my_qiita.items() ```.


Example
```
{% for item in craft.my_qiita.items() %}
<a href="{{ item.url }}" target="_blank">{{ item.title }}</a><br>
{% endfor %}
```

Please read about Qiita item's detail bellow,
[https://qiita.com/api/v2/docs#%E6%8A%95%E7%A8%BF](https://qiita.com/api/v2/docs#%E6%8A%95%E7%A8%BF)
## License
MIT License
