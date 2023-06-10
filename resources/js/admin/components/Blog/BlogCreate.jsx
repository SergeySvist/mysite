import React, { useContext, useState } from 'react';
import { useParams } from 'react-router-dom';
import { BlogContextData } from '../../contexts/BlogContext';
import ReactMarkdown from 'react-markdown';
import rehypeRaw from 'rehype-raw';
import emojione from 'emojione';

const BlogCreate = () => {

    const [text, setText] = useState("");
    const [title, setTitle] = useState("");
    const [img, setImg] = useState(null);
    const emojified = emojione.shortnameToImage(text);

    return (
        <div className='blogPage'>
                <div className="edit">
                <label htmlFor="">Title:</label> <br/>
                <input type="text" value={title} onChange={(e)=>{setTitle(e.target.value)}}/><br/><br/>

                <label htmlFor="">Image:</label> <br/>
                <input type="file" className='form-control' value={img} onChange={(e)=>{setImg(e.target.files[0])}}/><br/>

                <label htmlFor="">Text:</label> <br/>
                <textarea name="" id="" rows="20" placeholder='Input here...' value={text} onChange={(e)=>{setText(e.target.value)}}></textarea>
                <div className="buttons">
                    <button type="button" className="btn btn-primary">Create</button>
                </div>
            </div>
            <div className="text">
                <label htmlFor="">Preview:</label> <br/><br/>
                <h1>{title}</h1>

                {<ReactMarkdown rehypePlugins={[rehypeRaw]}>{emojified}</ReactMarkdown>}
            </div>

        </div>
    );
}

export default BlogCreate;
