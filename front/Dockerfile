FROM node:16

#set working directory
WORKDIR /front

ENV PATH /front/node_modules/.bin:$PATH

# add app
COPY ./front ./

RUN yarn global add react-scripts@3.4.1

#start app
CMD ["npm", "start"]