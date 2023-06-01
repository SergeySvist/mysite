import React from 'react';

const Skill = ({skill, deleteHandler}) => {
    return (
        <div className='skill'>
            <button class="circle cbtn btn" onClick={()=>{deleteHandler(skill.id)}} style={{backgroundImage: `conic-gradient(#304d86 ${skill.rate}%, #8ca0c9 0)`}}>
                <div class="inner">
                    <p>{skill.title}</p>
                    <i className="bi bi-trash3 fs-1 trash"></i>
                </div>
            </button>
        </div>
    );
}

export default Skill;
