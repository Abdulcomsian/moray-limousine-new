@extends('layouts.master-admin')
@section('title', 'Manage Home Page')

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <form action="{{route('updateHomePageCMS')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="phoneNumber">Phone Number:</label>
                                    <input type="tel" class="form-control" placeholder="Phone number"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER}}"
                                           id="phoneNumber" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : ''}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="emailAddress">Email Address:</label>
                                    <input type="email" class="form-control" placeholder="Email Address"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS}}"
                                           id="emailAddress" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) : ''}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="search_text">Text User Search Bar : </label>
                                    <input type="text" class="form-control" placeholder="Text User Search"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_TEXT_UNDER_PICK_TIME}}"
                                           id="search_text" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_TEXT_UNDER_PICK_TIME) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_TEXT_UNDER_PICK_TIME) : ''}}">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="address">Address:</label>
                                    <textarea id="address" placeholder="Address"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_ADDRESS}}"
                                              class="form-control">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Top Slider</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : 'https://via.placeholder.com/1500x1000' }}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE}}"
                                         alt="placeholder image">
                                </div>
                                <div class="col-md-5">
                                    <label for="topSliderText">Top Slider Text:</label>
                                    <textarea class="form-control" placeholder="Slider Text"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT}}"
                                              id="topSliderText">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) : ''}}</textarea>
                                    <label class="mt-3 d-block" for="topSliderImage"><span
                                                class="d-block">Slider Image</span>
                                        <span class="btn btn-dark mt-2"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <input type="file" name="{{\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE}}"
                                           class="d-none form-control image-pick" id="topSliderImage">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Our Fleet</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="ourFleetTitle">Our Fleet Title:</label>
                                <input type="text" placeholder="Our fleet title" class="form-control" id="ourFleetTitle"
                                       name="{{\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE}}" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) : ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Your Advantage</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="advantageTitle">Your Advantage Title:</label>
                                    <input type="text" id="advantageTitle" class="form-control"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE}}"
                                           placeholder="Your Advantage Title" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) : ''}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="advantageDescription">Your Advantage Description:</label>
                                    <input type="text" id="advantageDescription" class="form-control"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_DESCRIPTION}}"
                                           placeholder="Your Advantage Description" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_DESCRIPTION) : ''}}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 1</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="advantageTitleCol1" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE}}"
                                           class="form-control" placeholder="Title" id="advantageTitleCol1" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) : ''}}">
                                    <label for="advantageDescriptionCol1" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="advantageDescriptionCol1"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) : ''}}</textarea>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 2</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="advantageTitleCol2" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE}}"
                                           class="form-control" placeholder="Title" id="advantageTitleCol2" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) : ''}}">
                                    <label for="advantageDescriptionCol2" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="advantageDescriptionCol2"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) : ''}}</textarea>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 3</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="advantageTitleCol3" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE}}"
                                           class="form-control" placeholder="Title" id="advantageTitleCol3" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) : ''}}">
                                    <label for="advantageDescriptionCol3" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="advantageDescriptionCol3"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) : ''}}</textarea>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 4</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="advantageTitleCol3" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE}}"
                                           class="form-control" placeholder="Title" id="advantageTitleCol3" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) : ''}}">
                                    <label for="advantageDescriptionCol3" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="advantageDescriptionCol3"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>About Us</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="aboutUsTitle">Title</label>
                                    <input type="text" name="{{\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE}}"
                                           id="aboutUsTitle" class="form-control" placeholder="Title" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE) : ''}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="aboutUsDescription">Description</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_ABOUT_US_DESCRIPTION}}"
                                           id="aboutUsDescription" class="form-control" placeholder="Description" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_DESCRIPTION) : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Our Services</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="servicesTitle">Title</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE}}"
                                           id="servicesTitle" class="form-control" placeholder="Title" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) : ''}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="servicesDescription">Description</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_DESCRIPTION}}"
                                           id="aboutUsDescription" class="form-control" placeholder="Description" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_DESCRIPTION) : ''}}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 1</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="servicesTitleCol1" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_TITLE}}"
                                           class="form-control" placeholder="Title" id="servicesTitleCol1" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_TITLE) : ''}}">
                                    <label for="servicesDescriptionCol1" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="servicesDescriptionCol1"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_DESCRIPTION) : ''}}</textarea>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 2</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="servicesTitleCol2" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_TITLE}}"
                                           class="form-control" placeholder="Title" id="servicesTitleCol2" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_TITLE) : ''}}">
                                    <label for="servicesDescriptionCol2" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="servicesDescriptionCol2"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_DESCRIPTION) : ''}}</textarea>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <h6>Column 3</h6>
                                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_IMAGE)) : 'https://via.placeholder.com/1500x1000'}}" class="img-fluid {{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_IMAGE}}"
                                         alt="placeholder iamge">
                                    <label class="mt-2">
                                        <input type="file"
                                               name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_IMAGE}}"
                                               class="d-none image-pick">
                                        <span class="btn btn-dark"><i class="fa fa-picture-o"></i></span>
                                    </label>
                                    <label for="servicesTitleCol3" class="d-block">Title:</label>
                                    <input type="text"
                                           name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_TITLE}}"
                                           class="form-control" placeholder="Title" id="servicesTitleCol3" value="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_TITLE) : ''}}">
                                    <label for="servicesDescriptionCol3" class="mt-2">Description:</label>
                                    <textarea class="form-control" id="servicesDescriptionCol3"
                                              name="{{\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_DESCRIPTION}}"
                                              placeholder="Description">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_DESCRIPTION) : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-header"></div>
                        <div class="card-body">
                        <div class="col-md-12 mt-2">
                            <label for="address">Address:</label>
                            <textarea id="footer_page1" placeholder="Address"
                                      name="{{\App\Utills\Constants\AppConsts::FOOTER_PAGE_ONE}}"
                                      class="form-control editor">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_ONE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_ONE) : ''}}</textarea>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-header"></div>
                        <div class="card-body">
                        <div class="col-md-12 mt-2">
                            <label for="address">Address:</label>
                            <textarea id="footer_page2"  placeholder="Address"
                                      name="{{\App\Utills\Constants\AppConsts::FOOTER_PAGE_TWO}}"
                                      class="form-control editor">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_TWO) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_TWO) : ''}}</textarea>
                        </div>
                        </div>
                    </div>

                    <button class="btn btn-dark my-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        let descriptionEditor;
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#address'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#footer_page2'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#footer_page1'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
        $(document).on('change', '.image-pick', function () {
            let thisName = $(this).attr('name');
            $('.' + thisName).attr('src', (window.URL ? URL : webkitURL).createObjectURL(this.files[0])) ;
        });
    </script>
@endsection
