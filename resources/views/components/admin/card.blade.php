@props(["title", "content"])
<div class="card">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            {{$title}}
          </h3>
          <h1>
            {{$content}}
          </h1>
        </div>
            {{$icon}}
      </div>
    </div>
  </div>