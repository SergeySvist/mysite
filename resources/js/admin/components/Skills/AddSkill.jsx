import React from 'react';
import { useState } from 'react';

const AddSkill = ({addHandler}) => {
    let [title, setTitle] = useState("");
    let [rate, setRate] = useState(1);

    return (
        <div className='skill'>
            <button class="circle cbtn btn" style={{backgroundImage: `conic-gradient(#304d86 100%, #8ca0c9 0)`}} data-bs-toggle="modal" data-bs-target={`#skillModal`}>
                <div class="inner "><i className="bi bi-plus-circle fs-1"></i></div>
            </button>

            <div class="skill-modal modal fade" id={`skillModal`} tabindex="-1" aria-labelledby={`skillModalLabel`} aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id={`skillModalLabel`}>Add new skill</h1>
                    <button type="button" class="btn text-light fs-3" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <label htmlFor="">Title:</label><br/>
                    <input type="text" placeholder='Input here...' value={title} onChange={(e)=>{setTitle(e.target.value)}}/><br/>
                    <label htmlFor="">Rate: {rate}</label><br/>
                    <input type="range" class="form-range" min="1" max="100" value={rate} onChange={(e)=>{setRate(e.target.value)}}/><br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onClick={()=>addHandler({title, rate})}>Save changes</button>
                </div>
                </div>
            </div>
            </div>        

        </div>
    );
}

export default AddSkill;
