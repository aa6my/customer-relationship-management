//$(function(){

                                       function varDeclare(){

                                            var job_hour    = $('#job_hour'),
                                                job_task_amount = $('#job_task_amount'),
                                                job_task_hour   = $('#job_task_hour');

                                                /** return as [0,1,2] **/
                                                return [job_hour, job_task_amount, job_task_hour]; 
                                       }

                                       function cal(job_hour, job_task_hour){

                                            var new_amount = (parseFloat(job_hour.val()) * parseFloat(job_task_hour.val()));
                                                return new_amount;
                                       }




                                    


                                       


                                   // });