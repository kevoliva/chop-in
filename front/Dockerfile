FROM node:14

#set working directory
WORKDIR /front

ENV PATH /front/node_modules/.bin:$PATH

# add app
COPY ./front/package.json /front

RUN yarn install
RUN yarn global add react-scripts@3.4.1

COPY ./front /front

#start app
CMD ["yarn", "start"]