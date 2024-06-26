@extends('Core.Admin.Http.Views.layout', [
    'title' => __('admin.title', [
        'name' => __('admin.notifications.add_title'),
    ]),
])

@push('content')
    <div class="admin-header d-flex align-items-center">
        <a href="{{ url('admin/notifications/list') }}" class="back_btn">
            <i class="ph ph-caret-left"></i>
        </a>
        <div>
            <h2>@t('admin.notifications.add_title')</h2>
            <p>@t('admin.notifications.add_description')</p>
        </div>
    </div>

    <form data-form="add" data-page="notifications">
        @csrf
        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="event">
                    @t('admin.notifications.event')
                </label>
            </div>
            <div class="col-sm-9">
                <input name="event" id="event" placeholder="@t('admin.notifications.event')" type="text" class="form-control"
                     required>
                <small>Example: <code>flute.choose_lang</code></small>
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="title">
                    @t('admin.notifications.title_label')
                </label>
            </div>
            <div class="col-sm-9">
                <input name="title" id="title" placeholder="@t('admin.notifications.title_label')" type="text" class="form-control"
                     required>
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="icon">
                    @t('admin.notifications.icon')
                </label>
                <small>@t('admin.notifications.icon_desc')</small>
            </div>
            <div class="col-sm-9">
                <input name="icon" id="icon" placeholder="@t('admin.notifications.icon')" type="text" class="form-control"
                     required>
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label">
                <label for="url">
                    @t('admin.notifications.url')
                </label>
            </div>
            <div class="col-sm-9">
                <input name="url" id="url" placeholder="@t('admin.notifications.url')" type="text" class="form-control"
                    >
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="content">
                    @t('admin.notifications.content')
                </label>
            </div>
            <div class="col-sm-9">
                <textarea name="content" id="content" placeholder="@t('admin.notifications.content')" class="form-control" required></textarea>
                <small>@t('admin.notifications.content_desc')</small>
            </div>
        </div>

        <!-- Кнопка отправки -->
        <div class="position-relative row form-check">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" data-save class="btn size-m btn--with-icon primary">
                    @t('def.save')
                    <span class="btn__icon arrow"><i class="ph ph-arrow-right"></i></span>
                </button>
            </div>
        </div>
    </form>
@endpush
