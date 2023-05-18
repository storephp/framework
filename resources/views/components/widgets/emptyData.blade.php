
    <div class="empty">
        <div class="empty-icon">
            @svg('tabler-' . $icon)
        </div>
        <p class="empty-title">{{ $title }}</p>
        <p class="empty-subtitle text-muted">
            {{ $subtitle }}
        </p>
        @if ($actionRoute)
            <div class="empty-action">
                <a href="{{ $actionRoute }}" class="btn btn-primary">
                    <span class="me-2">
                        @svg('tabler-' . $actionIcon)
                    </span>
                    {{ $actionLabel }}
                </a>
            </div>
        @endif
    </div>
