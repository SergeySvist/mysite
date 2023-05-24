import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';

const client = axios.create({baseURL});

const AboutMe = () => {
    let [info, setInfo] = useState({});

    useEffect(()=>{
        const getInfo = async ()=>{
            const resp = await client.get('/api/info', {params: {lang: "en"}});
            setInfo(resp.data.data[0]);
        }
        getInfo();
    }, []);

    return (
        <div className='aboutMe'>
            <div className="text">
                <h1>About Me</h1>
                <p>My name is <input type="text" className='names' value={info.name} /> <input type="text" className='names' value={info.surname} />.</p>
                <textarea  type="text" value={info.description} />
                <a className='btn btn-primary' href={`${baseURL}api/info/download?lang=en&file=cv`}>Upload new CV</a>
            </div>
            <div className="img">
                <button className='btn'>Upload new photo</button>
                <img src={info.avatar_url} alt="" height="500px"/>
            </div>

            <button type="submit" className='submit'>Submit <i class="bi bi-box-arrow-in-right"></i></button>

        </div>
    );
}

export default AboutMe;
