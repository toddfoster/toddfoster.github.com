---
title: Todd's Tiliches
layout: default
---

{% for post in site.posts %}
          {% if post.featured == true limit:1%}
          <article>
            <p>{{ post }}</p>
          </article>
          {% endif %}
{% endfor %}

