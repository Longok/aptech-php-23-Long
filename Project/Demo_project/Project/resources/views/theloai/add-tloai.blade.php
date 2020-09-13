@extends('layout.master')
@include('layout.header')

<div class="row">
    <div class="col-lg-12">
        <section class="panel mt-3">
            <header class="col-xs-4 col-md-4 mx-auto text-primary">  
            Thêm thể loại
            </header>
                <div class="col-xs-4 col-md-4 mx-auto">
                    <form action="{{URL::to('add-tloai')}}" method="post">
                    {{csrf_field()}}
                        <div class="div mt-3">
                            <label for="">Tên thể loại</label>
                            <input type="text"class="form-control" name="tentheloai"placeholder="Tên thể loại" >
                        </div>
                        
                        <button type="submit" class="btn-primary mt-3">Thêm thể loại</button>
                    
                    </form>
                
                </div>
        </section>        
    </div>
</div>