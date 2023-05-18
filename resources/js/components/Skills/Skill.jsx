import React from 'react';

const Skill = ({skill}) => {
    return (
        <div className='skill'>
            <div class="circle" style={{backgroundImage: `conic-gradient(#304d86 ${skill.rate}%, #8ca0c9 0)`}}>
                <div class="inner">{skill.title}</div>
            </div>
        </div>
    );
}

export default Skill;
